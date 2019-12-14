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
        <p>Datos del paciente</p>
      </div>
      <div class="col align-self-end">
        <p class="float-right">Fecha: {{ $cita->fecha_hora }}</p>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="row">
            <div class="col">
                <label>Nombre del paciente</label>
            </div>
            <div class="col">
                <p>{{ $cita->paciente->nombre }} santander martinez</p>
            </div>
            <div class="col">
                <button>Editar</button>
            </div>
        </div>
      </div>
      <div class="col">
        <div class="row">
            <div class="col">
                <label>Alegias</label>
            </div>
            <div class="col">
                <p>{{ $cita->paciente->alergias }}</p>
            </div>
        </div>
      </div>
      <div class="col">
        <div class="row">
            <div class="col">
                <label>Actividad física</label>
            </div>
            <div class="col">
                <p>{{ $cita->paciente->actividadFisica }}</p>
            </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="row">
            <div class="col">
                <label>Edad</label>
            </div>
            <div class="col">
                <p>{{ $cita->paciente->edad }}</p>
            </div>
        </div>
      </div>
      <div class="col">
        <div class="row">
            <div class="col">
                <label>Peso</label>
            </div>
            <div class="col">
                <p>{{ $cita->paciente->peso }} Kg</p>
            </div>
            <div class="col">
                <button>Editar</button>
            </div>
        </div>
      </div>
      <div class="col">
        <div class="row">
            <div class="col">
                <label>Estatura</label>
            </div>
            <div class="col">
                <p>{{ $cita->paciente->estatura }} cm</p>
            </div>
            <div class="col">
                <button>Editar</button>
            </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="row">
            <div class="col">
                <label>Género</label>
            </div>
            <div class="col">
                <p>{{ $cita->paciente->genero }}</p>
            </div>
        </div>
      </div>
      <div class="col">
        <p>IMC: IMC_CALCULADO</p>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <p>Consulta</p>
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