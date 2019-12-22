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
      <div class="col align-self-end">
        <p class="float-right">Fecha:
        {{ Carbon\Carbon::now()->format('d/m/Y') }}
        </p>
      </div>
    </div>

<!-- Datos del paciente --> 

    <div class="row">
      <div class="col">
        <h1>Datos del paciente</h1>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <p>RFC: {{ $cita->paciente->rfc }}</p>
      </div>
      <div class="col">
        <p>Nombre: {{ $cita->paciente->nombre}}</p>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <p>Sexo:
            {{ $cita->paciente->sexo }}
        </p>
      </div>
      <div class="col">
        <p>Fecha de nacimiento:
            {{ $cita->paciente->fecha_nacimiento }}
        </p>
      </div>
    </div>

    <div class="row">
        <div class="col">
          <label>Edad: EDAD_CALCULADO</label>
          <label>Años</label>
        </div>
        <div class="col">
          <label>IMC: IMC_CALCULADO</label>
       </div>
    </div>

    <div class="form-group row">
        <div class="col">
          <p>Correo:
            {{ $cita->paciente->correo_electronico }}
            <button>Editar</button>
          </p>
        </div>        
        <div class="col">
          <p>Telefono:
            {{ $cita->paciente->telefono }}
            <button>Editar</button>
          </p>
        </div>
    </div>


   <!-- Características del paciente --> 
    
    <div class="row">
      <div class="col">
        <h1>Características del paciente</h1>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <p>Peso:
          {{ $cita->paciente->peso }}
          <label>Kg</label>
          <button>Editar</button>
        </p>
      </div>
      <div class="col">
        <p>Talla:
          {{ $cita->paciente->estatura }}
          <label>cm</label>
          <button>Editar</button>
        </p>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <p>Actividad física:
          {{ $cita->paciente->actividad_fisica }}
          <button>Editar</button>
        </p>
      </div>
      <div class="col">
        <p>Alergias:
          {{ $cita->paciente->alergias }}
          <button>Editar</button>
        </p>

      </div>
    </div>

    <div class="row">
        <div class="col">
          <label>Porcentaje de grasa:</label>
          <input min='0' max='100' type="number" name="grasa_porcentaje">
          <label>%</label>
        </div>
        <div class="col">
          <label>Porcentaje de músculo:</label>
          <input min='0' max='100' type="number" name="musculo_porcentaje">
          <label>%</label>
        </div>
    </div>

    <div class="row">
        <div class="col">
          <label>Hueso:</label>
          <input min='1' max='100' type="number" name="hueso_kilos">
          <label>kg</label>
        </div>
        <div class="col">
          <label>Agua:</label>
          <input min='1' max='100' type="number" name="agua_litros">
          <label>L</label>
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