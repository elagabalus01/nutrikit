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
      <div class="col">
        <h1>Datos del paciente</h1>
      </div>
      <div class="col align-self-end">
        <p class="float-right">Fecha:
        La fecha de hoy ;v
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="row">
          <div class="col-md-3">
            <label>Nombre del paciente</label>
          </div>
          <div class="col-md-9">
            <input class="inputNombre" type="text" name="nombre">
          </div>
        </div>
      </div>
      <div class="col">
        <label>Alegias</label>
        <input type="text" name="alergias">
      </div>
      <div class="col">
        <label>Actividad física</label>
        <input type="text" name="act_fis">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <label>Edad</label>
        <input class="inputEdad" type="number" name="edad">
      </div>
      <div class="col">
        <label>Peso</label>
        <input class="inputEdad" type="number" name="alergias">
        <label>Kg</label>
      </div>
      <div class="col">
        <label>Estatura</label>
        <input class="inputEdad" type="number" name="estatura">
        <label>cm</label>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <label>Género</label>
        <select name="genero">
          <option value="masculino">H</option>
          <option value="femenino">M</option>
        </select>
      </div>
      <div class="col">
        <p>IMC: IMC_CALCULADO</p>
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
      <div class="col-md-12">
        @include('app.componentes.tablaHabitualPlan')
      </div>
    </div>
    <div class="row">
      <div class="col-md-7">
        @include('app.componentes.tablaCalculoCalorias')
      </div>
      <div class="col-md-5">
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