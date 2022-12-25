<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PemasukanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' =>  'guest'], function(){
    Route::get('/login',[LoginController::class,'login'])->name('login');
    Route::post('/login',[LoginController::class,'postlogin'])->name('postlogin');
});

Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'ceklevel:admin,petugas,bendahara']], function(){
    Route::get('/home', function () {
        return view('dashboard');
    })->middleware('auth');

    Route::resource('user', UserController::class);

    Route::resource('pemasukan', PemasukanController::class);
    Route::post('/pemasukan/status/{id}', [PemasukanController::class,'status']);
    Route::get('/pemasukan-export',[PemasukanController::class,'pemasukanExport'])->name('export-pemasukan'); 

    route::get('/profil',[UserController::class,'profil'])->name('profil');   
    Route::patch('/update-password', [UserController::class,'updatePassword'])->name('update-password'); 
});
