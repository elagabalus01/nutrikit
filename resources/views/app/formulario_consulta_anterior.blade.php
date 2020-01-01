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
      <div class="col align-self-star">
        <p class="float-left">
          <b>Consulta:</b> {{ $consulta->cita_id ? 'Subsecuente' : 'Primera vez' }}
        </p>
      </div>
      <div class="col align-self-end">
        <p class="float-right">
          <b>Fecha:</b>
        {{ $consulta->fecha }}
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
        <p>RFC: {{ $consulta->paciente->rfc }}</p>
      </div>
      <div class="col">
        <p>Nombre: {{ $consulta->paciente->nombre}}</p>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <p>Sexo:
            {{ $consulta->paciente->sexo }}
        </p>
      </div>
      <div class="col">
        <p>Fecha de nacimiento:
            {{ $consulta->paciente->cumpleaños }}
        </p>
      </div>
    </div>

    <div class="row">
        <div class="col">
          <label>Edad: {{ $consulta->edad_actual }}</label>
          <label>Años</label>
        </div>
        <div class="col">
          <label>IMC: {{ number_format($consulta->peso_actual/pow($consulta->estatura_actual/100,2),2) }}</label>
       </div>
    </div>

    <div class="form-group row">
        <div class="col">
          <p>Correo:
            {{ $consulta->paciente->correo_electronico }}
          </p>
        </div>        
        <div class="col">
          <p>Telefono:
            {{ $consulta->paciente->telefono }}
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
          {{ $consulta->peso_actual }}
          <label>Kg</label>
        </p>
      </div>
      <div class="col">
        <p>Talla:
          {{ $consulta->estatura_actual }}
          <label>cm</label>
        </p>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <p>Actividad física:
          {{ $consulta->actividad_fisica_actual }}
        </p>
      </div>
      <div class="col">
        <p>Alergias:
          {{ $consulta->paciente->alergias }}
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <p>Enfermedades:
          {{ $consulta->enfermedades_actual }}
        </p>
      </div>
    </div>
    <div class="row">
        <div class="col">
          <p>Porcentaje de grasa:
            {{ $consulta->grasa_porcentaje }}
            <label>%</label>
          </p>
        </div>
        <div class="col">
          <p>Porcentaje de músculo:
            {{ $consulta->musculo_porcentaje }}
            <label>%</label>
          </p>        
        </div>
    </div>

    <div class="row">
        <div class="col">
          <p>Hueso:
            {{ $consulta->hueso_kilos }}
            <label>kg</label>
          </p>   
        </div>
        <div class="col">
          <p>Agua:
            {{ $consulta->agua_litros }}
            <label>L</label>
          </p> 
        </div>
    </div>    

  <div class="row">
    <div class="col">
      <h1>Consulta</h1>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <label><b>Motivo de la consulta:</b> {{ $consulta->motivo }}</label>
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
      @include('app.componentes.tablas_calculada.tablaHabitualPlan_calculado')
    </div>
  </div>
  <div class="row">
    <div class="col-md-7">
      @include('app.componentes.tablas_calculada.tablaCalculoCalorias_calculado')
    </div>
    <div class="col-md-5">
      @include('app.componentes.tablas_calculada.tabla_cal_res_final_calculado')
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
<script type="text/javascript" src="{{ asset('js/tablas_calculadas.js') }}"></script>
@endsection