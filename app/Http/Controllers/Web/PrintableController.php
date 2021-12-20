<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;
use App\Models\Consulta;
use Illuminate\Support\Facades\Auth;

class PrintableController extends Controller
{
    public function reporteDia(){
        return view('app.componentes.opciones_reporte.dia');
    }
    public function reporteMes(){
        return view('app.componentes.opciones_reporte.mes');
    }
    public function reporteYear(){
        return view('app.componentes.opciones_reporte.year');
    }
    public function generarReporteDia($fecha){
        try{
            $fecha=Carbon::createFromFormat('Ymd',$fecha);
            $consultas=Consulta::whereDate('fecha_hora','=',$fecha->toDateString())
            ->where('id_medico','=',Auth::user()->id)
            ->orderBy('fecha_hora', 'desc')
            ->get();
        }
        catch(\Exception $e){
             abort(404);
        }
        $pdf=PDF::loadView('imprimibles.productividad',compact('consultas'))->setPaper('a4', 'landscape');
        if(count($consultas)<1){
            return redirect()->back()->withErrors(['No se realizaron consultas en ese periodo']);
        }
        return $pdf->download('productividad-'.$fecha->toDateString().'.pdf');
        // return view('imprimibles.productividad',compact('consultas'));
    }
    public function generarReporteMes($mes,$year){
        try{
            $fecha=Carbon::createFromFormat('Ym',$year.$mes);
            $consultas=Consulta::whereMonth('fecha_hora', '=', $fecha->month)
            ->whereYear('fecha_hora', '=', $fecha->year)
            ->where('id_medico','=',Auth::user()->id)
            ->orderBy('fecha_hora', 'desc')
            ->get();
        }
        catch(\Exception $e){
             abort(404);
        }
        if(count($consultas)<1){
            return redirect()->back()->withErrors(['No se realizaron consultas en ese periodo']);
        }
        $pdf=PDF::loadView('imprimibles.productividad',compact('consultas'))->setPaper('a4', 'landscape');
        return $pdf->download('productividad'.'-'.$mes.'-'.$year.'.pdf');
        // return view('imprimibles.productividad',compact('consultas'));
    }
    public function generarReporteYear($year){
        try{
            $fecha=Carbon::createFromFormat('Y',$year);
            $consultas=Consulta::whereYear('fecha_hora', '=', $fecha->year)
            ->where('id_medico','=',Auth::user()->id)
            ->orderBy('fecha_hora', 'desc')
            ->get();
        }
        catch(\Exception $e){
            abort(404);
        }
        if(count($consultas)<1){
            return redirect()->back()->withErrors(['No se realizaron consultas en ese periodo']);
        }
        $pdf=PDF::loadView('imprimibles.productividad',compact('consultas'))->setPaper('a4', 'landscape');
        return $pdf->download('productividad'.'-'.$year.'.pdf');
        // return view('imprimibles.productividad',compact('consultas'));
    }

    public function generarProductividad(){
        // Consulta::where('fecha_hora','<=', '2016-04-30')->where('end_date','>=', '2016-04-01')->get()
        $consultas=Consulta::whereMonth('fecha_hora', '=', Carbon::now()->month)
        ->whereYear('fecha_hora', '=', Carbon::now()->year)
        ->where('id_medico','=',Auth::user()->id)
        ->orderBy('fecha_hora', 'desc')
        ->get();
        $pdf=PDF::loadView('imprimibles.productividad',compact('consultas'))->setPaper('a4', 'landscape');
        // return $pdf->download('hora.pdf');
        return view('imprimibles.productividad',compact('consultas'));
    }
    public function generarNota($id){
        $consulta=Consulta::find($id);
        $pdf=PDF::loadView('imprimibles.notaMedica',compact('consulta'))->setPaper('a4');
        return $pdf->download('consulta'.'-'.str_replace(' ','-',$consulta->paciente->nombre).'-'.str_replace('/','-',$consulta->fecha).'.pdf');
        // return view('imprimibles.notaMedica',compact('consulta'));
    }
}