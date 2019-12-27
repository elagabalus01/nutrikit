@extends('layouts.plantillaLogged')
@section('titulo')
<title>NUTRIKIT</title>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Pacientes atendidos</h1>
            <div class="row" style="padding-bottom: 18px">
                @if($fecha ?? false)
                <div class="col-md-2">
                    <label>
                        Fecha:
                        {{ $fecha->format('d/m/Y') ?? '' }}
                    </label>
                </div>
                <div class="col-md-10 text-right">
                @else
                <div class="col-md-4">
                    <label>Buscar paciente</label>
                    <input maxlength="25" id="searchRfc" name="rfc" type="text" class="ui-autocomplete-input" placeholder="Nombre o RFC" />
                    <button disabled="true" class="btn btn-primary" id="ver">Ver</button>
                </div>
                <div class="col-md-8 text-right">
                @endif
                    <label>Fecha:</label>
                    @if($fecha ?? false)
                    <input min="{{ Carbon\Carbon::now()->subYears(20)->format('Y-m-d') }}" max="{{ Carbon\Carbon::now()->format('Y-m-d') }}" value="{{ $fecha->format('Y-m-d')  }}" type="date" id="fechaConsultas">
                    @else
                    <input min="{{ Carbon\Carbon::now()->subYears(20)->format('Y-m-d') }}" max="{{ Carbon\Carbon::now()->format('Y-m-d') }}" value="{{  Carbon\Carbon::now()->format('Y-m-d') }}" type="date" id="fechaConsultas">
                    @endif
                    <button class="btn btn-primary" id="irFecha">Ir</button>
                    <div id="fechaConsultasValid" class="valid-feedback">Aceptado</div>
                    <div id="fechaConsultasInvalid" class="invalid-feedback">Fecha no valida</div>   
                </div>
            </div>
        </div>
    </div>
    <div id="tablaConsultas">
        @if(count($consultas)>0)
        <div class="row justify-content-center">
            <div class="col-md-9">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Paciente</th>
                            <th>Fecha</th>
                            <th>Atendido por</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($consultas as $consulta)
                        <tr>
                            <td>
                                <a href="#" onclick="consultasAnteriores('{{ $consulta->paciente->rfc }}')">{{ $consulta->paciente->nombre }}</a>
                            </td>

                            <td>{{ $consulta->fecha }} {{ $consulta->hora }}</td>
                            <td>{{ $consulta->user->nombre }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $consultas->onEachSide(7)->links() }}
            </div>
        </div>
        @else
            @if($fecha ?? false)
            <div class="row">
                <div class="col">
                    <h3>Ese día no hubieron consultas</h3>
                </div>
            </div>
            @else
            <div class="row">
                <div class="col">
                    <h3>Aún no se han realizado consultas</h3>
                </div>
            </div>
            @endif
        @endif
    </div
></div>
@include('app.componentes.mensajes.modalError')
@endsection
@section('scripts')
<script>var api_token = "{{ Auth::user()->api_token }}" </script>
<script type="text/javascript" src="{{ asset('js/citas_consultas.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/validaciones.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/consultas_realizadas.js') }}"></script>
@endsection
