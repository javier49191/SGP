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
    return redirect()->route('alumnos.index');
});

Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');

Route::resource('alumnos', 'AlumnosController');
Route::resource('padrinos', 'PadrinosController');
Route::resource('aportes', 'AportesController');
Route::resource('estados', 'EstadosFinancierosController');