<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cita;
use App\Consulta;
use App\Paciente;
use Carbon\Carbon;

class AppController extends Controller
{
    public function index(){
        // Dispatch::where('user_id', Auth::id())->paginate(10); ejemplo para el futuro
        $citas=Cita::where('atendida',false)
                        ->whereDate('fecha_hora','=',Carbon::today()->toDateString())
                        ->paginate(4);
        // $citas=Cita::where('atendida',false)->paginate(4);
        // $citas=Cita::paginate(4);
        return view('app.citas_proximas',compact('citas'));
    }
    
    public function consultas(){
        $consultas=Consulta::paginate(4);
        return view('app.consultas_realizadas',compact('consultas'));
    }
    
    public function nuevaCita(){
        return view('app.cita_nueva');
    }
    
    public function nuevaConsulta(){
        return view('app.formulario_consulta_nueva');
    }
    
    public function consultaConCita($id){
        $cita=Cita::find($id);
        return view('app.formulario_consulta_con_cita',['cita'=>$cita]);
    }
    
    public function consultasPaciente($rfc){
        $consultas=Consulta::where('paciente_id',$rfc)->paginate(4);
        $paciente=Paciente::find($rfc);
        // $consultas=Paciente::find($id)->consultas::paginate(4);
        return view('app.consultas_de_paciente',compact('paciente','consultas'));
    }
    
    public function consulta($id){
        $consulta=Consulta::find($id);
        // $consultas=Paciente::find($id)->consultas::paginate(4);
        return view('app.formulario_consulta_anterior',['consulta'=>$consulta]);
    }
}
