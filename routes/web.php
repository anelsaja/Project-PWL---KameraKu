<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest']], function () {
    // Pengunjung
    Route::get('/login', 'AuthController@login')->name('login');
    Route::post('/ceklogin','AuthController@ceklogin');
    Route::get('/', 'VisitorController@searchkamera');
    Route::get('/actsearchkamera', 'VisitorController@actsearchkamera');
    Route::get('/booking/kamera/{id}', 'BookingController@create');
    Route::post('/booking/simpan', 'BookingController@store');
    Route::get('/booking/sukses/{id}', 'BookingController@success');
    Route::get('/cek-pesanan', 'BookingController@cekPesanan');
});

Route::group(['middleware' => ['auth']], function () {
    // admin
    Route::get('/home', 'KameraKuController@home');
    Route::get('/kamera', 'KameraKuController@kamera');
    Route::get('/kamera/add-form', 'KameraKuController@kameraaddform');
    Route::post('/kamera/save', 'KameraKuController@kamerasave');
    Route::get('/kamera/editform/{id}','KameraKuController@kameraeditform');
    Route::put('/kamera/update/{id}','KameraKuController@kameraupdate');
    Route::get('/kamera/delete/{id}','KameraKuController@kameradelete');
    Route::get('/users','KameraKuController@users');
    Route::get('/users/add-form', 'KameraKuController@usersaddform');
    Route::post('/users/save', 'KameraKuController@userssave');
    Route::get('/users/delete/{id}', 'KameraKuController@usersdelete');
    Route::get('/changepass','KameraKuController@changepass');
    Route::put('/password/update', 'KameraKuController@updatepass');
    Route::get('/penyewa', 'KameraKuController@penyewa');
    Route::get('/penyewa/delete/{id}', 'KameraKuController@penyewadelete');
    Route::get('/booking', 'KameraKuController@booking');
    Route::get('/booking/delete/{id}', 'KameraKuController@bookingdelete');
    Route::post('/booking/updatestatus/{id}', 'BookingController@updateStatus');
    
    Route::get('/logout','AuthController@logout');
});
