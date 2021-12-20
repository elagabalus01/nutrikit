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

// Grupo para rutas de la aplicación web, con usuario no logueados
Route::group(
    [
        'namespace' => 'Web',
        'middleware'=>'guest'
    ],function()
    {
        Route::get('/',function(){
            return redirect()->to('/login');
        });
        // Signup 
        Route::get('/signup', 'AuthController@signup_view')->middleware('prevent-back-history');
        Route::post('signup', 'AuthController@signup');
        // Login
        Route::get('/login', 'AuthController@login_view')->name('login');
        Route::post('/login', 'AuthController@login');
    }
);

Route::group(
    [
        'namespace' => 'Web',
        'middleware'=>'auth'
    ],function()
    {
        Route::post('/logout', 'AuthController@logout');
        
        Route::get('/citas/{fecha?}','AppController@citas')->middleware('prevent-back-history');
        
        Route::get('/nueva_cita','AppController@nuevaCita')->middleware('prevent-back-history');

        Route::get('/consultaCita/{id}','AppController@consultaConCita')->middleware('cita-atendida')->middleware('prevent-back-history');


        Route::get('/consultas/{fecha?}','AppController@consultas')->middleware('prevent-back-history');

        Route::get('/nuevaConsulta','AppController@nuevaConsulta')->middleware('prevent-back-history');

        Route::get('/pacientes/{id}','AppController@consultasPaciente')->middleware('prevent-back-history');
        Route::get('/consulta/{id}','AppController@consulta')->middleware('prevent-back-history');

        Route::get('/productividad','AppController@productividad');

        Route::get('/reporte/dia','PrintableController@reporteDia');
        Route::get('/reporte/mes','PrintableController@reporteMes');
        Route::get('/reporte/año','PrintableController@reporteYear');

        Route::get('/reporte/dia/{fecha}','PrintableController@generarReporteDia');
        Route::get('/reporte/mes/{mes}/{year}','PrintableController@generarReporteMes');
        Route::get('/reporte/año/{year}','PrintableController@generarReporteYear');
        Route::get('/nota/{rfc}','PrintableController@generarNota');
    }
);