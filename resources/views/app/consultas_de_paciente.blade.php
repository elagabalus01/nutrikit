@extends('layouts.main')
@section('titulo')
<title>NUTRIKIT</title>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Consultas anteriores</h1>
            @if(is_null($paciente))
            Hubo un error
            @else
            <label>Paciente: {{ $paciente->nombre }}</label>
            @endif
        </div>
    </div>
    @if(count($consultas)>0)
    <div class="row justify-content-center">
        <div class="col-md-9">
            <table class="table table-striped">
                <thead class="thead-blue">
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
                        <td>{{ $consulta->medico->nombre }}</td>
                        <td>
                            <a class="consulta" href="/consulta/{{ $consulta->id }}">Ver</a>
                            /
                            <a class="consulta" href="/nota/{{ $consulta->id }}">Nota médica</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $consultas->links() }}
    @else
    <div class="row">
        <div class="col">
            <h3>No hay consultas aún</h3>
        </div>
    </div>
    @endif
</div>
@endsection