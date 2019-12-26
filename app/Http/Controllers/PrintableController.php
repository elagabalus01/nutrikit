<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;
use App\Consulta;
use Illuminate\Support\Facades\Auth;

class PrintableController extends Controller
{
    public function generarProductividad(){
        // Consulta::where('fecha_hora','<=', '2016-04-30')->where('end_date','>=', '2016-04-01')->get()
        $consultas=Consulta::whereMonth('fecha_hora', '=', Carbon::now()->month)
        ->whereYear('fecha_hora', '=', Carbon::now()->year)
        ->where('user_id','=',Auth::user()->id)
        ->orderBy('fecha_hora', 'desc')
        ->get();
        // $consultas=Consulta::all();
        // $pdf=PDF::loadView('imprimibles.productividad',compact('consultas'))->setPaper('a4', 'landscape');
        // return $pdf->download('hora.pdf');
        return view('imprimibles.productividad',compact('consultas'));
    }
}

