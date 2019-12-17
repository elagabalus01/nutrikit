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
    return redirect()->to('/app');
});
Route::get('/register', 'RegistrationController@create')->middleware('guest')->middleware('prevent-back-history');
Route::post('register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create')->name('login')->middleware('guest');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy'); //posiblmente se pueda cambiar a post

Route::get('/app','AppController@index')->middleware('auth')->middleware('prevent-back-history');
Route::get('/consultas','AppController@consultas')->middleware('auth')->middleware('prevent-back-history');
Route::get('/nueva_cita','AppController@nuevaCita')->middleware('auth')->middleware('prevent-back-history');

Route::get('/nuevaConsulta','AppController@nuevaConsulta')->middleware('auth')->middleware('prevent-back-history');

Route::get('/consulta/{id}','AppController@consultaConCita');

Route::get('/pacientes/{id}','AppController@consultasPaciente');
Route::get('/consultas/{id}','AppController@consulta');