<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Booking;
use App\Bukti_trans;

class Bukti_transController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tanggal = date('Y-m-d h:i:s');
        $user_id = Auth::user()->id;
        $kode_trans = Booking::select('kode_trans')->where('user_id',$user_id)->where('status','Belum Transfer')->value('kode_trans');
        return view('bukti_trans.index',compact('tanggal','kode_trans'));
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
            'tgl_upload' => 'required',
            'bukti_id' => 'required',
            'foto' => 'image|max:2048'
        ]);
        $tgl_upload = $request->tgl_upload;
        $bukti_id = $request->bukti_id;
        $kode = DB::table('bookings')->select('id')->where('kode_trans',$bukti_id)->value('id');
        $bukti_trans = new Bukti_trans;

        if ($request->hasFile('foto')) {
            // Mengambil file yang diupload
            $uploaded_cover = $request->file('foto');
            // mengambil extension file
            $extension = $uploaded_cover->getClientOriginalExtension();
            // membuat nama file random berikut extension
            $filename = md5(time()) . '.' . $extension;
            // menyimpan cover ke folder public/img
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
            $uploaded_cover->move($destinationPath, $filename);
            // mengisi field cover di book dengan filename yang baru dibuat
        }
        $ubah_status = DB::table('bukti_trans')->insert(array('tgl_upload'=>$tgl_upload, 'booking_id'=>$kode,'gambar'=>$filename));
        $user_id = Auth::user()->id;
        $status = 'Sudah Transfer';
        $ubah_status = DB::table('bookings')->where('user_id',$user_id)->update(['status'=>$status]);
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Bukti berhasil diupload"
        ]);
        return redirect()->route('bukti_trans.index');
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
