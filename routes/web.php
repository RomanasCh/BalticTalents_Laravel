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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('welcome');
});

Route::get('/radars', 'RadarController@index')->middleware('checklang')->name('radars.index');

Route::get('/radar/{id}', 'RadarController@show')->middleware('checklang')->name('radars.show');

Route::get('/radars/create', 'RadarController@create')->middleware('checklang')->name('radars.create');

Route::put('/radars/create', 'RadarController@store')->name('radars.store');

Route::get('/radar/{id}/edit', 'RadarController@edit')->middleware('checklang')->name('radars.edit');

Route::put('/radar/{id}/edi', 'RadarController@update')->middleware('checklang')->name('radars.update');

Route::get('/radars/{id}/delete', 'RadarController@destroy')->name('radars.delete');

Route::get('/radars/{id}/restore', 'RadarController@restore')->name('radars.restore');

Route::get('/radars/trash', 'RadarController@setTrashon')->middleware('checklang')->name('radars.settrashon');

Route::get('/radars/notrash', 'RadarController@setTrashoff')->middleware('checklang')->name('radars.settrashoff');

Route::get('/radars/lang', 'RadarController@locale')->name('radars.locale');

/* Driver */
Route::get('/drivers', 'DriverController@index')->middleware('checklang')->name('drivers.index');

Route::get('/driver/{id}', 'DriverController@show')->middleware('checklang')->name('drivers.show');

Route::get('/drivers/create', 'DriverController@create')->middleware('checklang')->name('drivers.create');

Route::put('/drivers/create', 'DriverController@store')->name('drivers.store');

Route::get('/driver/{id}/edit', 'DriverController@edit')->middleware('checklang')->name('drivers.edit');

Route::put('/driver/{id}/edi', 'DriverController@update')->name('drivers.update');

Route::get('/drivers/{id}/delete', 'DriverController@destroy')->name('drivers.delete');

Route::get('/drivers/{id}/restore', 'DriverController@restore')->name('drivers.restore');

Route::get('/drivers/trash', 'DriverController@setTrashon')->middleware('checklang')->name('drivers.settrashon');

Route::get('/drivers/notrash', 'DriverController@setTrashoff')->middleware('checklang')->name('drivers.settrashoff');
/* Stations */

Route::get('/stations', 'StationController@index')->name('stations.index');

Route::get('/stations/{id}', 'StationController@show')->name('stations.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
