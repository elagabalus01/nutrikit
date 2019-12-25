<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('consulta','API\ConsultaController')->middleware('auth:api');
Route::get('formulario','API\ConsultaController@formulario');
Route::post('autocomplete', 'API\CitaController@autocomplete');
Route::resource('cita','API\CitaController')->middleware('auth:api');
Route::get('pacientes/{rfc}/{campo}', 'API\PacienteController@datos')->middleware('auth:api');
Route::post('pacientes/{rfc}/{campo}', 'API\PacienteController@actualizar')->middleware('auth:api');
Route::post('paciente/{id}','API\ConsultaController@consultasPaciente')->middleware('auth:api');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Prueba para subir una foto al servidor
Route::post('/upload','PhotoController@uploadPic');
