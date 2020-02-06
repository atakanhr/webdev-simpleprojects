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
Route::get('/anasayfa','App@index');
Route::get('/hakkimizda','App@hakkimizda');
Route::get('/ornek','Ornek');
Route::get('/iletisim','Ornek@iletisim');
Route::get('kullanici/{id}', 'Ornek@kullanici');
Route::resource('photos', 'PhotoController'); 
Route::get('/shorter','ShortController@index');
Route::post('/shorter/make', 'LinkController@make')->name('make');
Route::get('/shorter/{code}', 'LinkController@get');
