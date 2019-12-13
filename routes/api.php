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

Route::resource('animal','API\animalController')->middleware('auth:api');
Route::resource('consulta','API\consultaController')->middleware('auth:api');
Route::resource('cita','API\CitaController')->middleware('auth:api');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Prueba para subir una foto al servidor
Route::post('/upload','PhotoController@uploadPic');
// Route::post('autocomplete', 'SearchController@autocomplete');
