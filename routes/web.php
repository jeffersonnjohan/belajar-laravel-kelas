<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/hello', function () {
    echo '<h1> Hello World </h1>';
    echo '<h2> Sedang belajar laravel </h2>';
});

Route::get('/mahasiswa/{nama}', function ($nama) {
    return "Hai $nama";
});

Route::get('/hubungi-kami', function () {
    return "<h1> Hubungi Kami </h1>";
});

Route::get('/profile', function(){
    return view('mahasiswa.profile');
});

Route::get('/greet/{nama}', function($nama){
    $nim = '2502041224';
    return view('profile', [
        'nama' => $nama,
        'nim' => $nim
    ]);
});

Route::redirect('/contact-us','/hubungi-kami');

Route::prefix('/admin')->group(function(){
    Route::get('/mahasiswa', function(){
        return '<h1>Halaman Daftar Mahasiswa</h1>';
    });
    Route::get('/dosen', function(){
        return '<h1>Halaman Daftar Dosen</h1>';
    });
    Route::get('/karyawan', function(){
        return '<h1>Halaman Daftar Karyawan</h1>';
    });
});

Route::fallback(function(){
    return view('welcome');
});

// Query Parameter
Route::get('/test', function(Request $request){
    $name = $request->query('name');
    $nim = $request->nim;
    return "you are trying to search $name, nim $nim";
});