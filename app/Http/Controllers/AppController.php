<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {

        return view('app.citas');
        return view('app.citas');
    }
    public function consultas()
    {
        return view('app.consultas');
    }
    public function nuevaCita()
    {
        return view('app.nueva_cita');
    }
    public function nuevaConsulta()
    {
        return view('app.nuevaConsulta');
    }
}
