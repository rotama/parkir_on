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
use App\Parkir;

Route::get('/', function () {
    $a = Parkir::get();
    return view('welcome',compact('a'));
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('settings/password', 'SettingsController@editPassword');
Route::post('settings/password', 'SettingsController@updatePassword');
	
Route::group(['prefix'=>'admin', 'middleware'=>['auth','role:admin']], function () {
	Route::resource('users', 'UsersController');
	Route::resource('parkirs', 'ParkirsController');
	Route::resource('dendas', 'DendasController');
	Route::resource('perawatans', 'PerawatansController');
	Route::resource('daftar_bookings', 'Daftar_bookingsController');
	Route::resource('masterbookings', 'MasterbookingsController');
});

Route::group(['prefix'=>'member', 'middleware'=>['auth','role:member']], function () {
	Route::resource('histories', 'HistoriesController');
	Route::resource('bookings', 'BookingsController');
	Route::resource('profils', 'ProfilsController');
	Route::resource('bukti_trans', 'Bukti_transController');
});
