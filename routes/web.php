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

Route::prefix('cliente')->group( function() {
    Route::post(''      , 'App\Http\Controllers\ClienteController@store'  )->name('cliente.store');
    Route::put('{id}'   , 'App\Http\Controllers\ClienteController@update' )->name('cliente.update');
    Route::delete('{id}', 'App\Http\Controllers\ClienteController@destroy')->name('cliente.destroy');
    Route::get('{id}'   , 'App\Http\Controllers\ClienteController@show'   )->name('cliente.show');
});

Route::get('consulta/final-placa/{numero}', 'App\Http\Controllers\ClienteController@searchByLastPlateNumber')->name('cliente.searchByLastPlateNumber');

Route::get('/', function () {
    return view('welcome');
});
