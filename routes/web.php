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

Route::resource('medicos', 'MedicosController');
Route::get('/citas/api', 'CitasController@fetch');
Route::get('/citas/agendar/{id}', 'CitasController@agendar');
Route::resource('citas', 'CitasController');
