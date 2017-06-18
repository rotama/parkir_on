<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Booking;
use App\Bukti_trans;
use App\Parkir;
use App\Perawatan;
use App\Masterbooking;

class MasterbookingsController extends Controller
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
            $masterbookings = Booking::with('user','parkir');
            return Datatables::of($masterbookings)
                ->addColumn('action', function($masterbooking){
                    return view('datatable._action2', [
                        'model' => $masterbooking,
                        'detail_url' => route('masterbookings.show', $masterbooking->id),
                        
                        'confirm_message' => 'Apakah Anda Yakin ingin Membatalkan Kode Booking ' . $masterbooking->kode_trans . '?'
                ]);
            })->make(true);
        }
        $html = $htmlBuilder
            ->addColumn(['data' => 'kode_trans', 'name'=>'kode_trans', 'title'=>'Kode Booking'])
            ->addColumn(['data' => 'tgl_booking', 'name'=>'tgl_booking', 'title'=>'Tanggal Booking'])
            ->addColumn(['data' => 'tgl_keluar', 'name'=>'tgl_keluar', 'title'=>'Tanggal Keluar'])
            ->addColumn(['data' => 'user.name', 'name'=>'user.name', 'title'=>'Nama'])
            ->addColumn(['data' => 'parkir.slot', 'name'=>'parkir.slot', 'title'=>'Slot'])
            ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'Action', 'orderable'=>false, 'searchable'=>false]);
            
        return view('masterbookings.index')->with(compact('html'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        date_default_timezone_set('Asia/Jakarta');
        $selisih_hari = Booking::select(
            'tgl_booking',
            'tgl_keluar',
            DB::raw("DATEDIFF(current_time,tgl_keluar) as selisih")
        )->where('id',$id)->value('selisih');

        $lama = Booking::select(
            'tgl_booking',
            'tgl_keluar',
            DB::raw("DATEDIFF(tgl_keluar,tgl_booking) as selisih")
        )->where('id',$id)->value('selisih');

        $a = Booking::select(
            'tgl_keluar'
        )->where('id',$id)->value('tgl_keluar');

        $c = date('h:i:s', strtotime($a));
        $now = date('h:i:s');
        $keluar = DB::table('keluars')->where('booking_id',$id)->select('tgl_kel','keterlambatan')->first();
        if($now <= $c){
            $a="Tidak Kena Denda";
        }else{
            $a="Kena Denda";
        }
        
        $ada_denda = DB::table('keluars')->select('denda')->where('booking_id',$id)->first();
        $daftar_bookings = Booking::with('user','parkir','bukti')->where('id', $id)->first();
        $tmp_gmbr = Bukti_trans::select('gambar')->where('booking_id',$id)->first();
        $hrg_parkir = Parkir::select('harga')->value('harga');
        $hrg_denda = DB::table('dendas')->select('harga')->value('harga');
        $cek = Booking::where('id',$id)->select('perawatan')->value('perawatan');
        $kena_denda = DB::table('keluars')->select('denda')->where('booking_id',$id)->value('denda');
        if($kena_denda > 0){
            $kena_denda=$kena_denda;
        }else{
            $kena_denda = 0;
        }
        if ($cek == "Ya"){
            $hrg_perawatan = Perawatan::select('harga')->value('harga');
        }else{
            $hrg_perawatan = 0;
        }
        $hrg_parkir = Parkir::select('harga')->value('harga');
        $total = ($hrg_parkir * $lama) + $hrg_perawatan + $kena_denda;

        $masterbookings = Booking::with('user','parkir')->where('id',$id)->first();
        $keluar = Masterbooking::where('booking_id',$id)->first();
        return view('masterbookings.detail',compact('masterbookings','keluar','total','lama','hrg_perawatan','hrg_denda','keluar','ada_denda'));
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
    }
}