<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cita;
use App\Consulta;
use App\Paciente;
use Carbon\Carbon;
use PDF;

class AppController extends Controller
{
    public function citas($fecha=null){
        // Dispatch::where('user_id', Auth::id())->paginate(10); ejemplo para el futuro
        if(is_null($fecha)){
            $citas=Cita::where('atendida',false)
                    ->whereDate('fecha_hora','=',Carbon::today()->toDateString())
                    ->orderBy('fecha_hora', 'asc')
                    ->paginate(4);
            return view('app.citas_proximas',compact('citas'));
        }
        else{
            try{
                $fecha=Carbon::createFromFormat('Ymd',$fecha);
                // $consultas=Consulta::orderBy('fecha_hora','desc')->paginate(4);
                $citas=Cita::whereDate('fecha_hora','=',$fecha->toDateString())
                        ->orderBy('fecha_hora', 'asc')
                        ->where('atendida',false)
                        ->paginate(4);
                return view('app.citas_proximas',compact('citas'))->with('fecha',$fecha);
            }
            catch(\Exception $e){
                 abort(404);
            }
        }
        // $citas=Cita::where('atendida',false)->paginate(4);
        // $citas=Cita::paginate(4);
    }
    
    public function consultas($fecha=null){
        if(is_null($fecha)){
            $consultas=Consulta::orderBy('fecha_hora','desc')->paginate(4);
            return view('app.consultas_realizadas',compact('consultas'));
        }
        else{
            try{
                $fecha=Carbon::createFromFormat('Ymd',$fecha);
                // $consultas=Consulta::orderBy('fecha_hora','desc')->paginate(4);
                $consultas=Consulta::whereDate('fecha_hora','=',$fecha->toDateString())
                        ->orderBy('fecha_hora', 'asc')
                        ->paginate(4);
                return view('app.consultas_realizadas',compact('consultas'))->with('fecha',$fecha);
            }
            catch(\Exception $e){
                 abort(404);
            }
        }
        // $consultas=Consulta::paginate(4);
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
        // $pdf=PDF::loadView('app.formulario_consulta_anterior',['consulta'=>$consulta])->setPaper('a4', 'landscape');
        // return $pdf->download('hora.pdf');
        return view('app.formulario_consulta_anterior',['consulta'=>$consulta]);
    }
}
