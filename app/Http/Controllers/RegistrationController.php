<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\User;
use Validator;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required'
        // ]);
        $validator=Validator::make($input, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);
        if($validator->fails()){
            return back()->withErrors([
                'message' => 'El correo ya esta registrado'
            ]);
        }
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'api_token' => Str::random(60),
        ]);
        auth()->login($user);
        $userPrueba = Auth::user();

        return redirect()->to('/login');
    }

}
