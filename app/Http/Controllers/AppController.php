<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cita;
use App\Consulta;

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
        $consultas=Consulta::paginate(4);
        return view('app.consultas',compact('consultas'));
    }
    public function nuevaCita()
    {
        return view('app.nueva_cita');
    }
    public function nuevaConsulta()
    {
        return view('app.nuevaConsulta');
    }
    public function citaConsulta($id)
    {
        $cita=Cita::find($id);
        return view('app.citaConsulta',['cita'=>$cita]);
    }
}
