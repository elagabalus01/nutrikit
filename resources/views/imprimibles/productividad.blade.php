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
        font-size: 15px;
    }
    .logo{
        width: 90px;
        float: left;
    }
    .logo_info{
        height: 100px;
    }
    .info{
        position: absolute;
        text-align: center;
        height: 200px;
        width: 100%;
        vertical-align: middle;
        font-size: 14px;
        /*line-height: 14px;*/
    }
    .user_fecha{
        padding-top: 12px;
        width: 100%;
    }
</style>

<body>
    <div class="logo_info">
        <!-- <div>
            <img class="logo" src="{{ public_path('nutrikit_logo.png') }}">
        </div> -->
        <div class="info">
            <p>
            SECRETARIA DE MARINA-ARMADA DE MÉXICO <br>
            OFICIALIA MAYOR <br>
            DIRECCIÓN GENERAL DE RECURSOS HUMANOS <br>
            DIRECCION GENERAL ADJUNTA DE SANIDA NAVAL <br>
            CLINICA NAVAL DE CUEMANCO <br>
            CALZADA DEL HUESO No.7700 COL. GRANJAS COAPA DEL. TALPAN. CIUDAD DE MEXICO C.P. 14330 TELEFONOS 56246500 EXT.8984 LICENCIA SANITARIA 0901409009 <br>
            </p>
        </div>
    </div>
<br>
<div class="user_fecha">
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
