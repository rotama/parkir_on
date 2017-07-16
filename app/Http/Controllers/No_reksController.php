<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Bank;

class No_reksController extends Controller
{
    //
    public function index(Request $request, Builder $htmlBuilder)
    {
        //
        if ($request->ajax()) {
            $banks = Bank::query();
            return Datatables::of($banks)->make(true);
        }
        $html = $htmlBuilder
            ->addColumn(['data' => 'no_rek', 'name'=>'no_rek', 'title'=>'No Rekening'])
            ->addColumn(['data' => 'atas_nama', 'name'=>'atas_nama', 'title'=>'Atas Nama'])
            ->addColumn(['data' => 'nm_bank', 'name'=>'nm_bank', 'title'=>'Nama Bank']);
            
        return view('banks.index')->with(compact('html'));
    }
}
