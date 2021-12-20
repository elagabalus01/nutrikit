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

Route::group(
    [
        'namespace' => 'API',
        'middleware'=>'auth:api'
    ],
    function(){
        Route::post('/autocomplete', 'CitaController@autocomplete');
        Route::resource('/cita','CitaController');
        Route::resource('/consulta','ConsultaController');
        Route::get('/formulario','ConsultaController@formulario');
        Route::post('/paciente/{id}','ConsultaController@consultasPaciente');
        Route::post('/paciente/check/{id}','PacienteController@check');
        // No se utiliza esta ruta
        Route::post('/api/pacientes/{rfc}/{campo}', 'API/PacienteController@datos');
        
        Route::post('/pacientes/{rfc}/{campo}', 'PacienteController@actualizar');
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
    }
);

// Prueba para subir una foto al servidor
Route::post('/upload','PhotoController@uploadPic');
