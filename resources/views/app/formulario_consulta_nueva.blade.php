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
        {{ Carbon\Carbon::now()->format('d/m/Y') }}
        </p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-1">
        <label>RFC:</label>
      </div>
      <div class="col-md-2">
        <input type="text" name="rfc">
      </div>
    </div>

    <div class="row">
      <div class="col-md-1">
        <label>Nombre:</label>
      </div>
      <div class="col-md-2">
        <input class="inputNombre" type="text" name="nombre">
      </div>
    </div>

   <div class="row">
        <div class="col-md-1">
          <label>Teléfono:</label>
        </div>
        <div class="col-md-2">
          <input type="tel" name="telefono">
      </div>
    </div>
    <div class="row">
        <div class="col-md-1">
          <label>Correo:</label>
        </div>
        <div class="col-md-2">
          <input type="email" name="correo">
      </div>
    </div>

    <div class="row">
        <div class="col-md-1">
          <label>Dirección:</label>
        </div>
        <div class="col-md-2">
          <input type="text" name="direccion">
      </div>
    </div>
    <br>
    </br>
    <div class="row">
      <div class="col">
        <div class="row">
          <div class="col-md-2">
            <label>Alergias:</label>
          </div>
          <div class="col-md-2">
            <input type="text" name="alergias">
          </div>
        </div>
      </div>
      <div class="col">
        <label>Actividad física:</label>
        <input type="text" name="act_fis">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <label>Sexo:</label>
        <select name="genero">
          <option value="femenino">Femenino</option>
          <option value="masculino">Masculino</option>
          <option value="otro">Otro</option>
        </select>
      </div>
      <div class="col">
        <label>Peso:</label>
        <input class="inputEdad" type="number" name="peso">
        <label>Kg</label>
      </div>
      <div class="col">
        <label>Talla:</label>
        <input class="inputEdad" type="number" name="talla">
        <label>cm</label>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-3">
        <label>Fecha de nacimiento:</label>
        <input class="form-control" type="date" value="1964-12-04" id="fecha_nacimiento">
      </div>
      <div class="col">
        <label>IMC: IMC_CALCULADO</label>
      </div>
      <div class="col">
        <label>Edad: EDAD_CALCULADO</label>
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
<script type="text/javascript" src="{{ asset('api.js') }}"></script>
@endsection