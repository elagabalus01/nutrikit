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
Route::get('/logout', 'SessionsController@destroy');

Route::get('/user','userController@showCurrentUser');
Route::get('/app','BaseController@index')->middleware('auth')->middleware('prevent-back-history');
Route::get('/report',function(){
    $pdf = PDF::loadView('invoice');
    return $pdf->stream('invoice.pdf');
});
Route::get('actualizar/{id}','baseController@update');

/*
Prueba para interactuar
con la base de datos
*/
Route::get('/prueba','BaseController@index');
// Route::post('/prueba','BaseController@procesar');

Route::get('/blade',function(){
    return view('blade1');
});
Route::get('/blade2',function(){
    return view('blade2');
});