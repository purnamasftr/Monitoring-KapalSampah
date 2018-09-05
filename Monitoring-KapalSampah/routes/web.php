<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('pemakaian_kapal/{id}', ['as' => 'pemakaian_kapal', 'uses' => 'PemakaianController@pemakaian']);
Route::get('pemakaian/tambah/{id}', ['as' => 'pemakaian_create', 'uses' => 'PemakaianController@create']);
Route::post('pemakaian_kapal/{id}',  ['as' => 'pemakaian.store', 'uses' => 'PemakaianController@store']);
Route::get('delete_pemakaian/{id}','PemakaianController@destroy');
Route::get('pemakaian_edit/{id}', ['as' => 'pemakaian_edit', 'uses' => 'PemakaianController@edit']);
Route::post('pemakaiann/{id}', ['as' => 'pemakaian.update', 'uses' => 'PemakaianController@update']);

Route::get('permintaan_kapal/{id}', ['as' => 'permintaan_kapal', 'uses' => 'PermintaanController@permintaan']);
Route::get('permintaan/tambah/{id}', ['as' => 'permintaan_create', 'uses' => 'PermintaanController@create']);
Route::post('permintaan_kapal/{id}',  ['as' => 'permintaan.store', 'uses' => 'PermintaanController@store']);
Route::get('delete_permintaan/{id}','PermintaanController@destroy');
Route::get('permintaan_edit/{id}', ['as' => 'permintaan_edit', 'uses' => 'PermintaanController@edit']);
Route::post('permintaann/{id}', ['as' => 'permintaan.update', 'uses' => 'PermintaanController@update']);
Route::get('permintaan_view/{id}', ['as' => 'permintaan_view', 'uses' => 'PermintaanController@show']);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('kapal/tambah', ['as' => 'kapal_create', 'uses' => 'KapalController@create']);
Route::post('kapal/',  ['as' => 'kapal.store', 'uses' => 'KapalController@store']);
Route::get('delete_kapal/{id}','KapalController@destroy');
Route::get('kapal/{id}', ['as' => 'kapal', 'uses' => 'KapalController@kapal']);
Route::get('kapal_edit/{id}', ['as' => 'kapal_edit', 'uses' => 'KapalController@edit']);
Route::post('kapal/{id}', ['as' => 'kapal.update', 'uses' => 'KapalController@update']);


Route::get('/downloadPDF/{id}','PermintaanController@downloadPDF');
Route::get('/downloadPDFpem/{id}','PermintaanController@downloadPDFpem');
