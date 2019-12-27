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
                    <label for="name">Nombre completo del médico:</label>
                    <input maxlength="64" type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo">
                    <div id="nombreValid" class="valid-feedback">Aceptado</div>
                    <div id="nombreInvalid" class="invalid-feedback">Nombre no valido</div>
                </div>
         
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input maxlength="50" type="email" class="form-control" id="email" name="email" placeholder="ejemplo@dominio.com">
                    <div id="emailValid" class="valid-feedback">Aceptado</div>
                    <div id="emailInvalid" class="invalid-feedback">Correo no valido</div>
                </div>
         
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input maxlength="32" type="password" class="form-control" id="password" name="password" placeholder="********">
                    <div id="passwordValid" class="valid-feedback">Aceptado</div>
                    <div id="passwordInvalid" class="invalid-feedback">Contraseña no valido</div>
                </div>
                <div class="form-group">
                    <button disabled="true" id="registrar" style="cursor:pointer" type="submit" class="btn btn-primary float-right">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/validaciones.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/registro.js') }}"></script>
@endsection