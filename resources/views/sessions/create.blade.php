@extends('layouts.plantillaNoLog')
@section('titulo')
<title>Iniciar sesión</title>
@endsection
@section('buttonNavbar')
<a class="nav-item nav-link" href="/register">Registrarse</a>
@endsection
@section('content')
<div class="container">
    @if($errors->any())
    <div class="alert alert-danger" role="alert">
        {{$errors->first()}}
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-3">
            <h1>Iniciar sesión</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-5">
            <form method="POST" action="/login">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <button style="cursor:pointer" type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection