<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Parkir;

class ParkirsController extends Controller
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
            $parkirs = Parkir::query();
            return Datatables::of($parkirs)
                ->addColumn('action', function($parkir){
                return view('datatable._action', [
                    'model' => $parkir,
                    'form_url' => route('parkirs.destroy', $parkir->id),
                    'edit_url' => route('parkirs.edit', $parkir->id),
                    'confirm_message' => 'Yakin mau menghapus ' . $parkir->nama . '?'
            ]);
            })->make(true);
        }
        $html = $htmlBuilder
            ->addColumn(['data' => 'slot', 'name'=>'slot', 'title'=>'Slot Parkir'])
            ->addColumn(['data' => 'harga', 'name'=>'harga', 'title'=>'Harga'])
            ->addColumn(['data' => 'posisi', 'name'=>'posisi', 'title'=>'Tipe Kendaraan'])
            ->addColumn(['data' => 'status', 'name'=>'status', 'title'=>'Status'])
            ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'Action', 'orderable'=>false, 'searchable'=>false]);
            
        return view('parkirs.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('parkirs.create');
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
            'slot' => 'required|string|unique:parkirs',
            'harga' => 'required',
            'posisi' => 'required|string|max:20',
        ]);
        $slot = $request->slot;
        $harga = $request->harga;
        $posisi = $request->posisi;
        $status = "Available";

        $a = Parkir::create([
            'slot' => $request['slot'],
            'harga' => $request['harga'],
            'posisi' => $request['posisi'],
            'status' => $status,
        ]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $a->slot"
        ]);
        return redirect()->route('parkirs.index');
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
        $parkir = Parkir::find($id);
        return view('parkirs.edit')->with(compact('parkir'));
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
            'slot' => 'required|string',
            'harga' => 'required',
            'posisi' => 'required|string|max:20',
        ]);

        $slot = $request->slot;
        $harga = $request->harga;
        $posisi = $request->posisi;

        $b = DB::table('parkirs')->where('id',$id)->update(['slot'=>$slot, 'harga'=>$harga, 'posisi'=>$posisi]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Mengubah $slot"
        ]);
        return redirect()->route('parkirs.index');
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
        DB::table('parkirs')->where('id', $id)->delete();

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Slot Parkir berhasil dihapus"
        ]);
        return redirect()->route('parkirs.index');
    }
}
