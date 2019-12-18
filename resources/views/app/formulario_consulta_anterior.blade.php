@extends('layouts.plantillaNoLog')
@section('titulo')
<title>Consultorio</title>
@endsection
@section('variables')
<script>var api_token = "{{ Auth::user()->api_token }}" </script>
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <h1>Datos del paciente</h1>
    </div>
    <div class="col-md-2 align-self-end">
      <p class="float-right">RFC: {{ $consulta->paciente->rfc }}</p>
    </div>
    <div class="col-md-2 align-self-end">
      <p class="float-right">Fecha: {{ $consulta->fecha }}</p>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <p>{{ $consulta->paciente->nombre}}</p>
    </div>
    <div class="col">
      <p>Género:
        @if($consulta->paciente->genero=='H')
        Masculino
        @else
        Femenino
        @endif
      </p>
    </div>
    <div class="col">
      <p>IMC: calculado</p>
    </div>
  </div>
  <div class="row" id="editables">
    <div class="col-md-6" id="numbers">
      <div class="row">
        <div class="col">
          <label class="float-right">Edad</label>
        </div>
        <div class="col-md-1">
          {{ $consulta->edad_actual }}
        </div>
        <div class="col">
          <label>Años</label>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label class="float-right">Peso</label>
        </div>
        <div class="col-md-1">
          {{ $consulta->peso_actual }}
        </div>
        <div class="col">
          <label>Kg</label>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label class="float-right">Estatura</label>
        </div>
        <div class="col-md-1">
          {{ $consulta->estatura_actual }}
        </div>
        <div class="col">
          <label>cm</label>
        </div>
      </div>
    </div>
    <div class="col-md-6" id="text">
      <div class="row">
        <div class="col">
          Alergias
        </div>
        <div class="col">
          {{ $consulta->paciente->alergias }}
        </div>
      </div>
      <div class="row">
        <div class="col">
          Actvidad fisicia
        </div>
        <div class="col">
          {{ $consulta->actividad_fisica_actual }}
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <h1>Consulta</h1>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <label>Dieta habitual</label>
      <br>
      <textarea rows="4" style="width:100%" name="dietaHabitual" readonly>{{ $consulta->descripcion_dieta }}</textarea>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <label>Observaciones</label>
      <br>
      <textarea rows="4" style="width:100%" name="observaciones" readonly>{{ $consulta->observaciones }}</textarea>
    </div>
  </div>
  <div class="row">
    <div class="col">
      @include('app.componentes.tablaHabitualPlan_calculado')
    </div>
  </div>
  <div class="row">
    <div class="col-md-7">
      @include('app.componentes.tablaCalculoCalorias_calculado')
    </div>
    <div class="col-md-5">
      @include('app.componentes.tablaCaloriasGrupo_calculado')
    </div>
  </div>
  <div class="row justify-content-end">
    <div class="col col-lg-1">
      <button onclick="window.history.go(-1);" class="btn btn-primary float-right">Cerrar</button>
    </div>
  </div>
  <div>
    <br>
  </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('api.js') }}"></script>
@endsection