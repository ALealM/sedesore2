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

 Route::get('/', 'HomeController@index');          

Auth::routes();
Route::group(['middleware'=>'auth'],function(){

Route::get('index', 'ReporteController@index');
Route::get('busqueda', 'ReporteController@busqueda');
Route::get('home', 'ReporteController@index');
Route::get('getLocalidad', 'ReporteController@getLocalidad');
Route::post('personal/store', 'ReporteController@store');
Route::post('personal/guardaPersona', 'ReporteController@guardaPersona');

Route::get('validaDatos', 'ReporteController@validaDatos');
Route::any('personal/buscar', 'ReporteController@listadoPersonal');

Route::get('personas/listado', 'ReporteController@listadoPersonas');
Route::get('personas/auditoria', 'ReporteController@auditoria');
Route::get('personas/auditoriaVer', 'ReporteController@auditoriaShow');
Route::get('guardaAud', 'ReporteController@guardaAud');

 });
