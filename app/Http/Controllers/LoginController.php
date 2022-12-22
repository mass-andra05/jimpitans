<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LoginController extends Controller
{
   public function login(){
    return view('login', [
        'title' => "Log In",
    ]);
   }

   public function postlogin(Request $request){
    if(Auth::attempt($request->only('username','password'))){
        return redirect('/home')->with('success', 'Login Berhasil!');
    }
    return redirect('/login')->with('warning', 'Login Gagal! <br> Pastikan Katasandi / <br> Username Yang benar!');
   }

   public function logout(){
    Auth::logout();
    return redirect('/login');
   }
}
