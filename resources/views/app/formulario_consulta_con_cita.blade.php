@extends('layouts.plantillaNoLog')
@section('titulo')
<title>NUTRIKIT</title>
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
      <p class="float-right">RFC: {{ $cita->paciente->rfc }}</p>
    </div>
    <div class="col-md-2 align-self-end">
      <p class="float-right">Fecha: {{ $cita->fecha }}</p>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <p>{{ $cita->paciente->nombre}}</p>
    </div>
    <div class="col">
      <p>Sexo:
        $cita->paciente->sexo
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
      @include('app.componentes.tablas_formularios.tablaHabitualPlan')
    </div>
  </div>
  <div class="row">
    <div class="col-md-7">
      @include('app.componentes.tablas_formularios.tablaCalculoCalorias')
    </div>
    <div class="col-md-5">
      @include('app.componentes.tablas_formularios.tabla_cal_res_final')
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

@endsection