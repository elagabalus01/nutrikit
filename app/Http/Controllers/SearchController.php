<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Paciente;
  
class SearchController extends Controller
{
    public function index()
    {
        return view('search');
    }

    public function autocomplete(Request $request)
    {
        $data = Paciente::select("nombre")
                ->where("nombre","LIKE","%{$request->input('query')}%")
                ->get();
        return response()->json($data);
    }
}