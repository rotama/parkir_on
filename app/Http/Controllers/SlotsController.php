<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use App\Booking;
Use App\Bank;
Use App\Perawatan;
Use App\Parkir;
Use App\Masterbooking;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class SlotsController extends Controller
{
    //
    function index(){
    	$a = Parkir::get();
    	return view('slots')->with(compact('a'));
    }
    function cari(Request $request){
    	date_default_timezone_set('Asia/Jakarta');
        $a = Bank::get();
        $this->validate($request, [
            'kode_trans' => 'required',
        ]);
    	$kode_trans = $request['kode_trans'];
        $masterbookings = Booking::with('user','parkir')->where('kode_trans',$kode_trans)->get();
        $cek = Booking::where('kode_trans',$kode_trans)->select('perawatan')->value('perawatan');
        if ($cek == "Ya"){
            $hrg_perawatan = Perawatan::select('harga')->value('harga');
        }else{
            $hrg_perawatan = 0;
        }
        $lama = Booking::select(
            'tgl_booking',
            'tgl_keluar',
            DB::raw("DATEDIFF(tgl_keluar,tgl_booking) as selisih")
        )->where('kode_trans',$kode_trans)->value('selisih');
        if($lama == 0){
            $lama = 1;
        }
        $hrg_denda = DB::table('dendas')->select('harga')->value('harga');
        $id = DB::table('bookings')->where('kode_trans',$kode_trans)->select('id')->value('id');
        $ada_denda = DB::table('keluars')->select('denda')->where('booking_id',$id)->first();
        $keluars = DB::table('keluars')->where('booking_id',$id)->select('keterlambatan')->value('keterlambatan');
        $cek_id_parkir = DB::table('bookings')->where('id',$id)->select('parkir_id')->value('parkir_id');
        $hrg_parkir = Parkir::where('id',$cek_id_parkir)->select('harga')->value('harga');
        $denda = $keluars * $hrg_denda;
        $keluar = Masterbooking::where('booking_id',$id)->first();
        $total = ($hrg_parkir * $lama) + $hrg_perawatan + $denda;
        return view('hasil',compact('a','masterbookings','hrg_perawatan','lama','keluar','hrg_parkir','ada_denda','total'));
    }
    function hasil($kode_trans){
        
        return view('hasil',compact('kode_trans',$kode_trans));
    }
}
