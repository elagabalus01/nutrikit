<?php
 
namespace App\Http\Controllers;

 
use Illuminate\Http\Request;
 
class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }
    
    public function store()
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'El correo o la contraseña son incorrectos. Intente de nuevo'
            ]);
        }
        
        return redirect()->to('/citas');
    }
    
    public function destroy()
    {
        auth()->logout();
        return redirect()->to('/login');
    }
}