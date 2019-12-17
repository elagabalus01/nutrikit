@extends('layouts.plantillaNoLog')
@section('titulo')
<title>Consultorio</title>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Consultas anteriores</h1>
            <label>Paciente: {{ $paciente->nombre }}</label>
        </div>
    </div>
    @if(count($consultas)>0)
    <div class="row justify-content-center">
        <div class="col-md-9">
            <table class="table">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Médico</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($consultas as $consulta)
                    <tr>
                        <td>{{ $consulta->fecha}} {{ $consulta->hora }}</td>
                        <td>{{ $consulta->user->nombre }}</td>
                        <td>
                            <a class="consulta" href="/consultas/{{ $consulta->id }}">Ver</a>
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
            <h3>No hay consultas aún</h3>
        </div>
    </div>
    @endif
</div>
@endsection