<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Role_user;
use App\User;
use App\Role;

class UsersController extends Controller
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
            $users = Role_user::with('user','role');
            return Datatables::of($users)
                ->addColumn('action', function($user){
                return view('datatable._action', [
                    'model' => $user,
                    'form_url' => route('users.destroy', $user->id),
                    'edit_url' => route('users.edit', $user->id),
                    'confirm_message' => 'Yakin mau menghapus ' . $user->nama . '?'
            ]);
            })->make(true);
        }
        $html = $htmlBuilder
            ->addColumn(['data' => 'user.id', 'name'=>'user.id', 'title'=>'ID'])
            ->addColumn(['data' => 'user.name', 'name'=>'user.name', 'title'=>'Nama'])
            ->addColumn(['data' => 'user.email', 'name'=>'user.email', 'title'=>'Email'])
            ->addColumn(['data' => 'role.display_name', 'name'=>'role.display_name', 'title'=>'Status'])
            ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'Action', 'orderable'=>false, 'searchable'=>false]);
            
        return view('users.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'same:password',
            'id' => 'required',
        ]);
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $role_id = $request->id;

        $a = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        $a->syncRoles([$role_id]);
        #$ids = 2;
        #$Status = new Role_user;
        #$Status->role_id = $ids;

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $a->name"
        ]);
        return redirect()->route('users.index');
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
        $role_user = Role_user::with('user','role')->where('user_id', $id)->first();
        return view('users.edit')->with(compact('role_user'));
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'id' => 'required',
        ]);
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $role_id = $request->id;

        $akun = DB::table('users')->where('id', $id)->update(['name'=>$name,'email'=>$email]);
        $role = DB::table('role_user')->where('user_id', $id)->update(['role_id'=>$role_id]);
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $name"
        ]);
        return redirect()->route('users.index');
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
        $kendaraan = Kendaraan::find($id);
        // hapus cover lama, jika ada
        DB::table('kendaraans')->where('id', $id)->delete();

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Kendaraan berhasil dihapus"
        ]);
        return redirect()->route('kendaraans.index');
    }
}
