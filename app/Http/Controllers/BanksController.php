<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Bank;

class BanksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        //
        if ($request->ajax()) {
            $banks = Bank::query();
            return Datatables::of($banks)
                ->addColumn('action', function($bank){
                return view('datatable._action', [
                    'model' => $bank,
                    'form_url' => route('banks.destroy', $bank->id),
                    'edit_url' => route('banks.edit', $bank->id),
                    'confirm_message' => 'Yakin mau menghapus ' . $bank->nama . '?'
            ]);
            })->make(true);
        }
        $html = $htmlBuilder
            ->addColumn(['data' => 'no_rek', 'name'=>'no_rek', 'title'=>'No Rekening'])
            ->addColumn(['data' => 'atas_nama', 'name'=>'atas_nama', 'title'=>'Atas Nama'])
            ->addColumn(['data' => 'nm_bank', 'name'=>'nm_bank', 'title'=>'Nama Bank'])
            ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'Action', 'orderable'=>false, 'searchable'=>false]);
            
        return view('banks.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('banks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'no_rek' => 'required|string|unique:banks',
            'atas_nama' => 'required',
            'nm_bank' => 'required|string|max:25',
        ]);
        $no_rek = $request->no_rek;
        $atas_nama = $request->atas_nama;
        $nm_bank = $request->nm_bank;

        $a = Bank::create([
            'no_rek' => $request['no_rek'],
            'atas_nama' => $request['atas_nama'],
            'nm_bank' => $request['nm_bank'],
        ]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $a->slot"
        ]);
        return redirect()->route('banks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $bank = Bank::find($id);
        return view('banks.edit')->with(compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'no_rek' => 'required|string',
            'atas_nama' => 'required',
            'nm_bank' => 'required|string|max:25',
        ]);
        $no_rek = $request->no_rek;
        $atas_nama = $request->atas_nama;
        $nm_bank = $request->nm_bank;

        $b = DB::table('banks')->where('id',$id)->update(['no_rek'=>$no_rek, 'atas_nama'=>$atas_nama, 'nm_bank'=>$nm_bank]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Data Berhasil Diubah"
        ]);
        return redirect()->route('banks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table('banks')->where('id', $id)->delete();

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Data berhasil dihapus"
        ]);
        return redirect()->route('banks.index');
    }
}
