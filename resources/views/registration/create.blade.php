@extends('layouts.plantillaNoLog')
@section('titulo')
<title>Registro</title>
@endsection
@section('buttonNavbar')
<a class="nav-item nav-link" href="/login">Iniciar sesión</a>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Registrar</h2>
        </div>
    </div>
    <div class="row">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                {{$errors->first()}}
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-md-3">
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
                    <button style="cursor:pointer" type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection