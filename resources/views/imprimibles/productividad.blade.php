<!DOCTYPE html>
<html>
<head>
    <title>Productividad</title>
</head>
<style type="text/css">
    table{
        text-align:center;
        border:3;
        /*border-spacing:100px;*/
        border-collapse: collapse;
        width: 100%;
    }
    table, th, td {
        border: 1px solid black;
    }
    .logo{
        width: 200px;
        float: left;
    }
    .logo_info{
        height: 200px;
    }
    .info{
        text-align: center;
        height: 200px;
        width: 100%;
        vertical-align: middle;
    }
</style>

<body>
    <div class="logo_info">
        <div>
            <img class="logo" src="{{ public_path('nutrikit_logo.png') }}">
        </div>
        <div class="info">
            <p>Nombre del consultorio</p>
            <p>Ubicacion</p>
        </div>
    </div>
<br>
<div>
    <label style="float: left;">
        Médico: {{ auth()->user()->nombre }}
    </label>
    <label style="float: right;">
        {{ Carbon\Carbon::now()->format('d-m-Y H:i:s') }}
    </label>
</div>
<br>
<br>
<div style="padding-bottom: 10px">
    @if(count($consultas)>0)
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>RFC</th>
                <th>Fecha</th>
                <th>Sexo</th>
                <th>IMC</th>
                <th>% grasa</th>
                <th>% musculo</th>
                <th>Kg hueso</th>
                <th>L agua</th>
                <th>Primera vez</th>
                <th>Subsecuente</th>
            </tr>
        </thead>
        <tbody>
            @foreach($consultas as $consulta)
            <tr>
                <td class='nombre'>{{ $consulta->paciente->nombre }}</td>
                <td>{{ $consulta->paciente->rfc }}</td>
                <td>{{ $consulta->fecha }}</td>
                <td>{{ $consulta->paciente->sexo }}</td>
                <td>{{ number_format($consulta->peso_actual/pow($consulta->estatura_actual/100,2),2) }}</td>
                <td>{{ $consulta->grasa_porcentaje }}</td>
                <td>{{ $consulta->musculo_porcentaje }}</td>
                <td>{{ $consulta->hueso_kilos }}</td>
                <td>{{ $consulta->agua_litros }}</td>
                <td>{{ is_null($consulta->cita) ? 'x' : '' }}</td>
                <td>{{ is_null($consulta->cita) ? '': 'x'  }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
</body>
</html>