<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Parkir;
use App\Perawatan;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $postings = Parkir::get();
        return view('bookings.index',compact('postings'));
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
        $this->validate($request, [
            'tgl_booking' => 'required',
            'tgl_keluar' => 'required',
        ]);

        $kode_trans = $request->kode_trans;
        $user_id = $request->user_id;
        $parkir_id = $request->parkir_id;
        $tgl_booking = $request->tgl_booking;
        $perawatan = $request->perawatan;
        $tgl_keluar = $request->tgl_keluar;

        $insert = DB::table('bookings')->insert(array(
            'kode_trans' => $kode_trans, 'user_id' => $user_id, 'parkir_id' => $parkir_id, 'tgl_booking' => $tgl_booking, 'perawatan' => $perawatan, 'tgl_keluar' => $tgl_keluar, 'status' => 'Belum Transfer'
        ));

        $ubah = DB::table('parkirs')
            ->where('id', $parkir_id)
            ->update(array('status' => 'Booked'));
        $nama = Auth::user()->name;
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Terima kasih $nama , Anda sudah Booking "
        ]);

        return redirect()->route('bookings.index');

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
        $data = Parkir::find($id);
        $servis = Perawatan::select('servis','harga')->first();
        $cek = DB::table('bookings')
            ->select(DB::raw('Max(id) as kd_max'));
        $prx="Trans-";

        if($cek->count() > 0){
            foreach($cek->get() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = $prx.sprintf("%06s", $tmp);
            }
        }else{
                $kd = $prx."000001";
        }
        return view('bookings.create',compact('data','servis','kd'));
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
