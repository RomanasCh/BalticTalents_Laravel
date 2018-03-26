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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/radars', 'RadarController@index')->name('radars.index');

Route::get('/radar/{id}', 'RadarController@show')->name('radars.show');

Route::get('/radars/create', 'RadarController@create')->name('radars.create');

Route::put('/radars/create', 'RadarController@store')->name('radars.store');

Route::get('/radar/{id}/edit', 'RadarController@edit')->name('radars.edit');

Route::put('/radar/{id}/edi', 'RadarController@update')->name('radars.update');

Route::get('/radars/{id}/delete', 'RadarController@destroy')->name('radars.delete');

Route::get('/radars/{id}/restore', 'RadarController@restore')->name('radars.restore');

/* Drivers */
Route::get('/drivers', 'DriverController@index')->name('drivers.index');

Route::get('/driver/{id}', 'DriverController@show')->name('drivers.show');

Route::get('/drivers/create', 'DriverController@create')->name('drivers.create');

Route::put('/drivers/create', 'DriverController@store')->name('drivers.store');

Route::get('/driver/{id}/edit', 'DriverController@edit')->name('drivers.edit');

Route::put('/driver/{id}/edi', 'DriverController@update')->name('drivers.update');

Route::get('/drivers/{id}/delete', 'DriverController@destroy')->name('drivers.delete');

Route::get('/drivers/{id}/restore', 'DriverController@restore')->name('drivers.restore');
/* Stations */

Route::get('/stations', function ()  {
    $stations = App\Models\FuelStation::all();

    return view('stations.index',
        compact('stations'));

});

Route::get('/stations/{id}', function ($id)  {

    $station = App\Models\FuelStation::find($id);
    return view('stations.show',
        compact('station'));

});
