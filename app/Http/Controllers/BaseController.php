<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Animal;

class BaseController extends Controller
{
    public function procesar(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (strlen($request['password'])>6)
        {
            return $request;
        }
        return redirect()->back()->withErrors("La contraseña es demasiado corta");
    }
    public function index()
    {
        $animales = Animal::paginate(2);
        return view('useApi',compact("animales"));
    }
    public function update($id)
    {
        return("El usuario ".$id);
    }
}