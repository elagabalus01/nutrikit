<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\User;

class UserController extends Controller
{
    public function showCurrentUser()
    {
        $userPrueba = Auth::user();
        return "Log as"."  ".$userPrueba->nombre;
    }
}
