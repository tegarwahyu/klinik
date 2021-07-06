<?php

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
    return view('auth.login');
});

Auth::routes();
// admin
Route::middleware(['is_admin'])->group(function () {
    Route::get('admin/home','App\http\Controllers\HomeController@adminHome')->name('admin.home');
    Route::get('admin/user','App\http\Controllers\HomeController@users')->name('user');
    Route::get('admin/getDataChart','App\http\Controllers\HomeController@getDataChart')->name('chart');
    
    // form input
    Route::get('admin/formCreaeteUser','App\http\Controllers\HomeController@toForminputUser')->name('form.user');
    Route::post('admin/saveForminputUser','App\http\Controllers\HomeController@saveForminputUser')->name('post.input.user');
    Route::get('admin/deleteDatatUser/{id}','App\http\Controllers\HomeController@deleteDatatUser')->name('delete.user');
    // edit belum ada

    // data pasien 
    Route::get('admin/dataPasien','App\http\Controllers\HomeController@getDataPasien')->name('data.pasien');
    Route::get('admin/formDaftarPasien','App\http\Controllers\HomeController@toFormDaftarPasien')->name('form.pasien');
    // Route::post('admin/saveFormDaftarPasien','App\http\Controllers\TransaksiController@saveFormDaftarPasien')->name('post.pasien');
    Route::post('admin/saveformPendaftaranPasien','App\http\Controllers\TransacController@saveformPendaftaranPasien')->name('pendaftaran.pasien');
    

    // data obat
    Route::get('admin/dataObat','App\http\Controllers\ObatController@getDataObat')->name('data.obat');
    Route::get('admin/formInputObat','App\http\Controllers\ObatController@toForminputObat')->name('form.obat');
    Route::post('admin/saveformInputObat','App\http\Controllers\ObatController@saveformInputObat')->name('post.input.obat');
    Route::get('admin/deleteDatatObat/{id}','App\http\Controllers\ObatController@deleteDatatObat')->name('delete.obat');

    // proses transaksi
    Route::get('admin/tindakPasien/{id}','App\http\Controllers\TransacController@tindakPasien')->name('tindak.pasien');
    // Route::get('admin/tindakPasien/{id}','App\http\Controllers\TransacController@tindakPasien')->name('tindak.pegawai');
    Route::post('admin/saveformTindakPasien','App\http\Controllers\TransacController@saveformTindakPasien')->name('post.tindak.pasien');
    
    // bayar obat
    Route::get('admin/saveBayarPasien/{id}','App\http\Controllers\TransacController@toBayarPasien')->name('bayar.obat');
    Route::post('admin/saveformPembayaranObat','App\http\Controllers\TransacController@saveformPembayaranObat')->name('post.pembayaran.obat');
    Route::get('admin/LihatPembayaranPasien/{id}','App\http\Controllers\TransacController@LihatPembayaranPasien')->name('lihat.bukti.pembayaran');
    
    
    
    

});

// user
Route::middleware(['is_user'])->group(function () {
    Route::get('user/home','App\http\Controllers\UsersController@usersiHome')->name('user.home');
    // pendaftaran user
    Route::get('users/formUserDaftarPasien','App\http\Controllers\UsersController@formUserDaftarPasien')->name('form.user.pasien');
    

    Route::get('users/dataPasien','App\http\Controllers\UsersController@usersiHome')->name('data.pasien');
    // Route::get('home','App\http\Controllers\HomeController@index')->name('home')->middleware('is_user');
});   


// pegawai
Route::middleware(['is_pegawai'])->group(function () {
    Route::get('pegawai/home','App\http\Controllers\PegawaiController@pegawaiHome')->name('pegawai.home');
    Route::get('users/dataPasien','App\http\Controllers\UsersController@usersiHome')->name('data.pasien');

    // tindak
    Route::post('admin/saveformTindakPasien','App\http\Controllers\TransacController@saveformTindakPasien')->name('post.tindak.pasien');
    // Route::get('pegawai/home','App\http\Controllers\HomeController@pegawaiHome')->name('pegawai.home')->middleware('is_pegawai');
});

