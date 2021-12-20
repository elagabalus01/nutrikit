<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Models\Medico;

use Validator;

class AuthController extends Controller
{
    // Get: Muestra la pantalla de registro de usuario
    public function signup_view()
    {
        return view('public.signup');
    }

    // Post: intenta realizar el registro de un nuevo usuario
    public function signup(Request $request)
    {
        $input = $request->all();
        $validator=Validator::make($input, [
            'nombre' => 'required',
            'paterno' => 'required',
            'email' => 'required|email|unique:medico,email',
            'password' => 'required'
        ]);
        if($validator->fails()){
            return back()->withErrors([
                $validator->errors()->first()
                // 'message' => 'El correo ya esta registrado'
            ]);
        }
        $user = Medico::create([
            'nombre' => ucwords($request['nombre']),
            'paterno' => ucwords($request['paterno']),
            'materno' => ucwords($request['materno']),
            'email' => strtolower($request['email']),
            'password' => Hash::make($request['password']),
            'api_token' => Str::random(60),
        ]);
        auth()->login($user);
        $userPrueba = Auth::user();

        return redirect()->to('/citas');
    }

    // Get: Muestra la pantalla de inicio de sesión
    public function login_view()
    {
        return view('public.login');
    }
    
    // Post: Realiza el inicio de sesión de un usario
    public function login()
    {

        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'El correo o la contraseña son incorrectos. Intente de nuevo'
            ]);
        }
        
        return redirect()->to('/citas');
    }
    
    public function logout()
    {
        auth()->logout();
        return redirect()->to('/login');
    }

}