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

Route::get('/', 'HomeController@index')->name('index');

Auth::routes();

Route::get('alumnos', 'AlumnoController@index')->name('alumnos');
Route::resource('alumnos/egresados', 'AlumnoEgresadoController');
Route::resource('alumnos/titulados', 'AlumnoTituladoController');
Route::resource('carreras', 'CarreraController');
Route::resource('generaciones', 'GeneracionController');
Route::resource('opciones-titulacion', 'OpcionTitulacionController');
Route::resource('periodos', 'PeriodoController');
