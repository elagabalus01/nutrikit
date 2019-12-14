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
      <p class="float-right">Cita ID: {{ $cita->id }}</p>
    </div>
    <div class="col-md-2 align-self-end">
      <p class="float-right">Fecha: {{ $cita->fecha_hora }}</p>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <p>{{ $cita->paciente->nombre}}</p>
    </div>
    <div class="col">
      <p>Género:
        @if($cita->paciente->genero=='H')
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
          Edad
        </div>
        <div class="col">
          {{ $cita->paciente->edad }}
        </div>
        <div class="col">
          Años
        </div>
        <div class="col">
          <button>Editar</button>
        </div>
      </div>
      <div class="row">
        <div class="col">
          Peso
        </div>
        <div class="col">
          {{ $cita->paciente->peso }}
        </div>
        <div class="col">
          Kg
        </div>
        <div class="col">
          <button>Editar</button>
        </div>
      </div>
      <div class="row">
        <div class="col">
          Estatura
        </div>
        <div class="col">
          {{ $cita->paciente->estatura }}
        </div>
        <div class="col">
          cm
        </div>
        <div class="col">
          <button>Editar</button>
        </div>
      </div>
    </div>
    <div class="col-md-6" id="text">
      <div class="row">
        <div class="col">
          Alergias
        </div>
        <div class="col">
          {{ $cita->paciente->alergias }}
        </div>
        <div class="col">
          <button>Editar</button>
        </div>
      </div>
      <div class="row">
        <div class="col">
          Actvidad fisicia
        </div>
        <div class="col">
          {{ $cita->paciente->actividadFisica }}
        </div>
        <div class="col">
          <button>Editar</button>
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
      <textarea rows="4" style="width:100%" name="dietaHabitual"></textarea>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <label>Observaciones</label>
      <br>
      <textarea rows="4" style="width:100%" name="observaciones"></textarea>
    </div>
  </div>
  <div class="row">
    <div class="col">
      @include('app.componentes.tablaHabitualPlan')
    </div>
  </div>
  <div class="row">
    <div class="col">
      @include('app.componentes.tablaCalculoCalorias')
    </div>
    <div class="col">
      @include('app.componentes.tablaCaloriasGrupo')
    </div>
  </div>
  <div class="row justify-content-end">
    <div class="col col-lg-1">
      <button onclick="window.location.href='/app';" class="btn btn-danger float-right">Cancelar</button>
    </div>
    <div class="col col-lg-1">
      <button onclick="window.location.href='/app';" class="btn btn-primary float-right">Aceptar</button>
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