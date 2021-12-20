@extends('layouts.main')
@section('titulo')
    <title>Crear una nueva cita</title>
@endsection
@section('variables')
<script>var api_token = "{{ Auth::user()->api_token }}" </script>
@endsection
@section('content')
<div class="container">
  @if(App\Models\Paciente::count()>0)
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
        <input maxlength="13" id="searchRfc" name="rfc" type="text" class="form-control ui-autocomplete-input" placeholder="Nombre o RFC del paciente" />
    </div>
  </div>
  <div class="form-group row justify-content-center">
    <label class="col-md-2 col-form-label">Fecha y hora</label>
    <div class="col-md-3">
      <input class="form-control" id="fechaHora" type="datetime-local" min="{{ substr(Carbon\Carbon::now()->toAtomString(),0,16) }}" value="{{ substr(Carbon\Carbon::now()->toAtomString(),0,16) }}" max="{{ str_replace(' ','T',Carbon\Carbon::now()->addYear()->format('Y-m-d H:i')) }}" id="dia_hora">
      <div id="fechaValid" class="valid-feedback">Aceptado</div>
      <div id="fechaInvalid" class="invalid-feedback">Fecha no válida</div>   
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-5">
      <button type="submit" disabled="true" class="btn btn-primary float-right" id="crearCita">Aceptar</button>
    </div>
  </div>
  @else
  <div class="row">
    <div class="col-md-8">
      <h1>Aún no hay pacientes</h1>
    </div>
  </div>
  @endif
</div>
@include('app.componentes.mensajes.modalError')
@include('app.componentes.mensajes.modalSuccess')
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/validaciones.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/nueva_cita.js') }}"></script>
@endsection