@extends('layouts.plantillaLogged')
@section('titulo')
    <title>Crear una nueva cita</title>
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <h1>Datos del paciente y selección de fecha</h1>
    </div>
  </div>
  <div class="row">
    <br>
  </div>
  <div class="form-group row justify-content-center">
    <label class="col-md-2 col-form-label">RFC del paciente</label>
    <div class="col-md-3">
        <input class="form-control" type="text" id="nombre">
    </div>
  </div>
  <div class="form-group row justify-content-center">
    <label class="col-md-2 col-form-label">Fecha y hora</label>
    <div class="col-md-3">
        <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="dia_hora">
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-5">
      <button type="submit" class="btn btn-primary float-right">Aceptar</button>
    </div>
  </div>
</div>
@endsection