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
                        <th>Cita</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($citas as $cita)
                    <tr>
                        <td>{{ $cita->paciente->nombre }}</td>
                        <td>{{ $cita->fecha_hora }}</td>
                        <td>
                            <a id="{{ $cita->id }}" class="consulta" href="#">Atender</a>
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
<script type="text/javascript" src="{{ asset('api.js') }}"></script>
@endsection