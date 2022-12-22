<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Data User';
        $data['levels'] = ['admin' => 'admin', 'petugas'=>'petugas','bendahara' => 'bendahara'];
        $data['rows'] = User::where('name',  'like', '%' . $request->q . '%')->paginate(10);
        return view('user.index', $data,[
            'title' => "Data User"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data['title'] = 'Tambah User';
        $data['levels'] = ['admin' => 'admin', 'kasir'=>'kasir', ];
        return view('user.create', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        User::create([
            'name' => $request->name, 'required',
            'level' => $request->level, 'required',
            'email' => $request->email, 'required',
            'username' => $request->username, 'required',
            'password' => bcrypt($request->password), 'required',
            'remember_token' => Str::random(60),
        ]);

        return redirect('user')->with('success', 'Tambah Data Berhasil!');

    }
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $data['title'] = 'Edit User';
        $data['row'] = $user;
        $data['levels'] = ['admin' => 'admin', 'petugas'=>'petugas','bendahara' => 'bendahara'];
        return view('user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'level' => 'required',
            'email' => 'required',
            'username' => 'required',
        ]);

        $user->name = $request->name;
        $user->level = $request->level;
        $user->email = $request->email;
        $user->username = $request->username;
        if ($request->password)
            $user->password = Hash::make($request->password);
        $user->save();
        return redirect('user')->with('success', 'Edit Data Berhasil!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('user')->with('success', 'Hapus Data Berhasil!');
    }

    // public function setting() {
    //     $data = array('title' => 'Setting Profil');
    //     return view('user.setting', $data);
    // }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function profil(){
        return view('user.profil',[
            'title' => "My Profile"
        ]);
    }

    public function updatePassword(Request $request, User $user)
    {
        $user = auth()->user();
        $request->validate([
            'password'                => 'required|',
            'password_baru'           => 'required|min:6|required_with:konfirmasi_password|same:konfirmasi_password',
            'konfirmasi_password'     => 'required|min:6'
        ]);

        if (Hash::check($request->password, $user->password)) {
            if ($request->password == $request->konfirmasi_password) {
                return redirect('/profil')->with('warning','Password gagal diperbarui, tidak ada yang berubah pada kata sandi');
            } else {
                $user->password = Hash::make($request->konfirmasi_password);
                $user->save();
                return redirect('/profil')->with('success','Password berhasil diperbarui');
            }
        } else {
            return redirect('/profil')->with('warning','Password tidak cocok dengan kata sandi lama');
        }
    }
}
