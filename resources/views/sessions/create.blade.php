@extends('layouts.plantillaNoLog')
@section('titulo')
<title>Iniciar sesión</title>
@endsection
@section('buttonNavbar')
<a class="nav-item nav-link btn btn-success custom-btn" href="/register">Registrarse</a>
@endsection
@section('content')
@if($errors->any())
<div class="alert alert-danger" role="alert">
    {{$errors->first()}}
</div>
@endif
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-3">
            <h1>Iniciar sesión</h1>
        </div>
    </div>
    <div class="row align-items-center justify-content-center">
        <div class="col-md-5">
            <form method="POST" action="/login">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input maxlength="50" type="email" class="form-control" id="email" name="email">
                    <div id="emailValid" class="valid-feedback">Aceptado</div>
                    <div id="emailInvalid" class="invalid-feedback">Correo no valido</div>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input maxlength="32" type="password" class="form-control" id="password" name="password">
                    <div id="passwordValid" class="valid-feedback">Aceptado</div>
                    <div id="passwordInvalid" class="invalid-feedback">Contraseña no valida</div>
                </div>
                <div class="form-group">
                    <button id="login" style="cursor:pointer" type="submit" class="btn btn-primary float-right">Iniciar sesión</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/validaciones.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/iniciar_sesion.js') }}"></script>
@endsection