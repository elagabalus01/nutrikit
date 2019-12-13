<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cita;

class AppController extends Controller
{
    public function index()
    {
        // Dispatch::where('user_id', Auth::id())->paginate(10); ejemplo para el futuro
        $citas=Cita::where('atendida',false)->paginate(4);
        // $citas=Cita::paginate(4);
        return view('app.citas',compact('citas'));
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
