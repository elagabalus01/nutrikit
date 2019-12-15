@extends('layouts.plantillaNoLog')
@section('titulo')
<title>Consultorio</title>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Consultas anteriores</h1>
        </div>
    </div>
    @if(count($consultas)>0)
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
                    @foreach($consultas as $consulta)
                    <tr>
                        <td>{{ $consulta->paciente->nombre }}</td>
                        <td>{{ $consulta->fecha_hora }}</td>
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