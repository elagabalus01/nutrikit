@extends('layouts.plantillaLogged')
@section('titulo')
<title>Consultas</title>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Pacientes atendidos</h1>
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
                        <th>Atendido por</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($consultas as $consulta)
                    <tr>
                        <td>{{ $consulta->paciente->nombre }}</td>
                        <td>{{ $consulta->fecha_hora }}</td>
                        <td>{{ $consulta->user->nombre }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col">
            <h3>Aún no se han realizado consultas</h3>
        </div>
    </div>
    @endif
</div>
@endsection