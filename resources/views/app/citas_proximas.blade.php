@extends('layouts.plantillaLogged')
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
            <h1>Próximas citas</h1>
        </div>
    </div>
    @if(count($citas)>0)
    <div class="row justify-content-center">
        <div class="col-md-9">
            <table class="table">
                <thead>
                    <tr>
                        <th>Paciente</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($citas as $cita)
                    <tr>
                        <td>
                            <a href="#" onclick="consultasAnteriores('{{ $cita->paciente->rfc }}')">{{ $cita->paciente->nombre }}</a>
                        </td>
                        <td>{{ $cita->fecha }} {{ $cita->hora }}</td>
                        <td>
                            <a id="{{ $cita->id }}" class="consulta" href="consulta/{{ $cita->id }}">Atender</a>
                            /
                            <a id="{{ $cita->id }}" class="eliminar cita" href="#">Cancelar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col">
            <h3>No hay citas por atender hoy</h3>
        </div>
    </div>
    @endif
    <div class="row justify-content-start">
        <div class="col">
            <h2>¿Sin previa cita? Haz click <a href="/nuevaConsulta">aqui</a></h2>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/citas_consultas.js') }}"></script>
@endsection