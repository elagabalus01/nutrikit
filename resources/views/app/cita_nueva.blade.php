@extends('layouts.plantillaLogged')
@section('titulo')
    <title>Crear una nueva cita</title>
@endsection
@section('variables')
<script>var api_token = "{{ Auth::user()->api_token }}" </script>
@endsection
@section('content')
<div class="container">
  @if(count(App\Paciente::all())>0)
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
        <input id="searchRfc" name="rfc" type="text" class="form-control ui-autocomplete-input" placeholder="nombre o rfc del paciente" />
    </div>
  </div>
  <div class="form-group row justify-content-center">
    <label class="col-md-2 col-form-label">Fecha y hora</label>
    <div class="col-md-3">
        <input class="form-control" id="fechaHora" type="datetime-local" min="{{ substr(Carbon\Carbon::now()->toAtomString(),0,16) }}" value="{{ substr(Carbon\Carbon::now()->toAtomString(),0,16) }}" id="dia_hora">
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
<script type="text/javascript" src="{{ asset('js/nueva_cita.js') }}"></script>
@endsection