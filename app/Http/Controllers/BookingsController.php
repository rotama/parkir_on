<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Parkir;
use App\Perawatan;
use Carbon\Carbon;

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
        $servis = $perawatan;

        $aa = new Carbon($tgl_keluar);
        $cc = new Carbon($tgl_booking);
        if($aa < $cc){
            Session::flash("flash_notification", [
                "level"=>"danger",
                "message"=>"Tanggal keluar yang anda input harus lebih besar dari tanggal booking"
            ]);
            return redirect()->route('bookings.index');
        }
        $cek_status = Parkir::select('status')->where('id',$parkir_id)->value('status');
        if($cek_status=='Booked'){
            Session::flash("flash_notification", [
                "level"=>"danger",
                "message"=>"Maaf Slot parkir sudah di booking "
            ]);
            return redirect()->route('bookings.index');
        }
        
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

        if($perawatan=="Ya"){
            $hrg_perawatan = Perawatan::select('harga')->value('harga');
        }else{
            $hrg_perawatan = 0;
        }
        $tgl_booking1 = new Carbon($tgl_booking);
        $tgl_keluar1 = new Carbon($tgl_keluar);
        $selisih = $tgl_booking1->diffInDays($tgl_keluar1);
        $selisih1 =$selisih;

        $slot = Parkir::select('slot')->where('id',$parkir_id)->value('slot');
        $hrg_parkir = Parkir::select('harga')->where('id',$parkir_id)->value('harga');
        if($selisih1 == 0){
            $selisihbaru = 1;
        }else{
            $selisihbaru=$selisih1;
        }
        $transfer = ($selisihbaru*$hrg_parkir) + $hrg_perawatan;
        return redirect('/konfirms/index')->with(['kode_trans'=>$kode_trans,'nama'=>$nama, 'transfer'=>$transfer, 'tgl_booking'=>$tgl_booking, 'tgl_keluar'=>$tgl_keluar, 'selisihbaru'=>$selisihbaru, 'hrg_parkir'=>$hrg_parkir, 'slot'=>$slot, 'hrg_perawatan'=>$hrg_perawatan, 'servis'=>$servis]);

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
