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
    return redirect()->to('/citas')->middleware('prevent-back-history');
});
Route::get('/register', 'RegistrationController@create')->middleware('guest')->middleware('prevent-back-history');
Route::post('register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create')->name('login')->middleware('guest');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy'); //posiblmente se pueda cambiar a post

// Route::get('/app','AppController@index')->middleware('auth')->middleware('prevent-back-history');
Route::get('/citas/{fecha?}','AppController@citas')->middleware('auth')->middleware('prevent-back-history');

Route::get('/consultas/{fecha?}','AppController@consultas')->middleware('auth')->middleware('prevent-back-history');
Route::get('/nueva_cita','AppController@nuevaCita')->middleware('auth')->middleware('prevent-back-history');

Route::get('/nuevaConsulta','AppController@nuevaConsulta')->middleware('auth')->middleware('prevent-back-history');

Route::get('/consultaCita/{id}','AppController@consultaConCita')->middleware('auth')->middleware('prevent-back-history');

Route::get('/pacientes/{id}','AppController@consultasPaciente')->middleware('auth')->middleware('prevent-back-history');
Route::get('/consulta/{id}','AppController@consulta')->middleware('auth')->middleware('prevent-back-history');

Route::get('/productividad','PrintableController@generarProductividad')->middleware('auth');