@extends('layouts.plantillaNoLog')
@section('titulo')
<title>Registro</title>
@endsection
@section('buttonNavbar')
<a role="button" class="nav-item nav-link btn btn-success custom-btn" href="/login">Iniciar sesión</a>
@endsection
@section('content')
@if($errors->any())
    <div class="alert alert-danger" role="alert">
        {{$errors->first()}}
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <h1>Registrar</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="POST" action="/register">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
         
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
         
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <button style="cursor:pointer" type="submit" class="btn btn-primary float-right">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection