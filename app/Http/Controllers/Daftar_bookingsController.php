<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use DateTime;
use App\Booking;
use App\Perawatan;
use App\Parkir;
use App\Bukti_trans;

class Daftar_bookingsController extends Controller
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
            $daftar_bookings = Booking::with('user','parkir','bukti')->orderby('tgl_booking','desc');
            return Datatables::of($daftar_bookings)
                ->addColumn('action', function($daftar_booking){
                    return view('datatable._action1', [
                        'model' => $daftar_booking,
                        'form_url' => route('daftar_bookings.destroy', $daftar_booking->id),
                        'confirm_url' => route('daftar_bookings.edit', $daftar_booking->id),
                        'confirm_message' => 'Apakah Anda Yakin ingin Membatalkan Kode Booking ' . $daftar_booking->kode_trans . '?'
                ]);
            })->make(true);
        }
        $html = $htmlBuilder
            ->addColumn(['data' => 'kode_trans', 'name'=>'kode_trans', 'title'=>'Kode Booking'])
            ->addColumn(['data' => 'tgl_booking', 'name'=>'tgl_booking', 'title'=>'Tanggal Booking'])
            ->addColumn(['data' => 'tgl_keluar', 'name'=>'tgl_keluar', 'title'=>'Tanggal Keluar'])
            ->addColumn(['data' => 'user.name', 'name'=>'user.name', 'title'=>'Nama'])
            ->addColumn(['data' => 'parkir.slot', 'name'=>'parkir.slot', 'title'=>'Slot'])
            ->addColumn(['data' => 'status', 'name'=>'status', 'title'=>'Status'])
            ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'Action', 'orderable'=>false, 'searchable'=>false]);
            
        return view('daftar_bookings.index')->with(compact('html'));
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

        if($now <= $c){
            $a="Tidak Kena Denda";
        }else{
            $a="Kena Denda";
        }
        
        $daftar_bookings = Booking::with('user','parkir','bukti')->where('id', $id)->first();
        $tmp_gmbr = Bukti_trans::select('gambar')->where('booking_id',$id)->first();
        $hrg_parkir = Parkir::select('harga')->value('harga');
        $cek = Booking::where('id',$id)->select('perawatan')->value('perawatan');
        if ($cek == "Ya"){
            $hrg_perawatan = Perawatan::select('harga')->value('harga');
        }else{
            $hrg_perawatan = 0;
        }
        $hrg_parkir = Parkir::select('harga')->value('harga');
        $total = ($hrg_parkir * $lama)+$hrg_perawatan;
        return view('daftar_bookings.edit')->with(compact('daftar_bookings','tmp_gmbr','hrg_perawatan','hrg_parkir','total'));
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
            'status' => 'required',
        ]);
        date_default_timezone_set('Asia/Jakarta');
        $selisih_hari = Booking::select(
            'tgl_booking',
            'tgl_keluar',
            DB::raw("DATEDIFF(current_time,tgl_keluar) as selisih")
        )->where('id',$id)->value('selisih');
        $dend=DB::table('dendas')->select('harga')->value('harga');
        
        $status = $request->status;
        if($status == 'Dibatalkan'){
            DB::table('bookings')
                ->where('id',$id)
                ->update(['status' => $status]);
            $a = Booking::select('parkir_id')->where('id',$id)->value('parkir_id');
            DB::table('parkirs')
                ->where('id',$a)
                ->update(['status' => 'Available']);
        }elseif($status == 'Keluar'){
            DB::table('bookings')
                ->where('id',$id)
                ->update(['status' => $status]);
            $a = Booking::select('parkir_id')->where('id',$id)->value('parkir_id');
            DB::table('parkirs')
                ->where('id',$a)
                ->update(['status' => 'Available']);
            $now = date('Y-m-d h:i:s');
            $now1 = date('h:i:s');
            $tampil = Booking::select(
                'tgl_keluar'
            )->where('id',$id)->value('tgl_keluar');
            $c = date('h:i:s', strtotime($tampil));
            if($now1 <= $c){
                $denda = ($selisih_hari + 0) * $dend;
            }else{
                $denda = ($selisih_hari + 1) * $dend;
            }
            $insert = DB::table('keluars')
                ->insert(['tgl_kel' => $now,'booking_id' => $id, 'keterlambatan'=>$selisih_hari,'denda'=>$denda]);
        }else{
            DB::table('bookings')
                ->where('id',$id)
                ->update(['status' => $status]);
        }
        
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Disimpan"
        ]);

        return redirect()->route('daftar_bookings.index');
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
        $ubah_stat_book = DB::table('bookings')
            ->where('id',$id)
            ->update(['status' => 'Dibatalkan']);
        $a = Booking::select('parkir_id')->where('id',$id)->value('parkir_id');
        DB::table('parkirs')
            ->where('id',$a)
            ->update(['status' => 'Available']);
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Booking tempat parkir telah dibatalkan"
        ]);
        return redirect()->route('daftar_bookings.index');
    }
}
