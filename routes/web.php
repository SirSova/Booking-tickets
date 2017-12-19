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

Auth::routes();

Route::get('/', function () {
    return view('home');
})->name('home');

/** Stadium routes */
Route::get('/stadiums', 'StadiumController@index')->name('stadiums');
Route::get('/stadium/{stadium_id}/sectors', 'StadiumController@show')->name('stadium_show');
Route::middleware(['auth'])->group(function () {
    Route::get('/create/stadium', 'StadiumController@create')->name('create_stadium');
    Route::post('/store/stadium', 'StadiumController@store')->name('store_stadium');
    Route::get('/edit/stadium/{stadium_id}', 'StadiumController@edit')->name('edit_stadium');
    Route::post('/update/stadium/{stadium_id}', 'StadiumController@update')->name('update_stadium');
    Route::delete('/delete/stadium/{stadium_id}', 'StadiumController@destroy')->name('destroy_stadium');

    /** Place routes */
    Route::post('/sector/booking_place', 'PlaceController@booking')->name('booking_ticket');
    Route::post('/sector/get_place', 'PlaceController@getPlace')->name('get_place');
});

/** Sector routes */
Route::get('/sector/{sector_id}', 'SectorController@index')->name('sector');
Route::post('/sector/{sector_id}/places', 'SectorController@getPlaces')->name('places');


