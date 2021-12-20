@extends('layouts.main')
@section('titulo')
<title>NUTRIKIT</title>
@endsection
@section('variables')
<script>var api_token = "{{ Auth::user()->api_token }}" </script>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            @if($fecha ?? false)
            <h1>Citas</h1>
            @else
            <h1>Próximas citas</h1>
            @endif
            <div class="row" style="padding-bottom: 18px">
                @if($fecha ?? false)
                <div class="col-md-2">
                    <label>
                        Fecha:{{ $fecha->format('d/m/Y') ?? '' }}
                    </label>
                </div>
                <div class="col-md-10 text-right">
                @else
                <div class="col-md-12 text-right">
                @endif
                    <label>Fecha:</label>
                    @if($fecha ?? false)
                    <input min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" max="{{ Carbon\Carbon::now()->addYear()->format('Y-m-d') }}" value="{{ $fecha->format('Y-m-d')  }}" type="date" id="fechaCitas">
                    @else
                    <input min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" max="{{ Carbon\Carbon::now()->addYear()->format('Y-m-d') }}" value="{{  Carbon\Carbon::now()->format('Y-m-d') }}" type="date" id="fechaCitas">
                    @endif
                    <button class="btn btn-primary" id="irFecha">Ir</button>
                    <div id="fechaCitasValid" class="valid-feedback">Aceptado</div>
                    <div id="fechaCitasInvalid" class="invalid-feedback">Fecha no valida</div>   
                </div>
            </div>
        </div>
    </div>
    @if(count($citas)>0)
    <div class="row justify-content-center">
        <div class="col-md-9">
            <table class="table table-striped">
                <thead class="thead-blue">
                    <tr>
                        <th>Paciente</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($citas as $cita)
                    @if(Carbon\Carbon::now()->subMinutes(20)->lt(Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$cita->fecha_hora)) )
                    <tr>
                        <td>
                            <a href="#" onclick="consultasAnteriores('{{ $cita->paciente->rfc }}')">{{ $cita->paciente->nombre }}</a>
                        </td>
                        <td>{{ $cita->fecha }} {{ $cita->hora }}</td>
                        <td>
                            @if($fecha ?? false)
                                @if($fecha->isToday() && Carbon\Carbon::now()->addMinutes(30)->gt(Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$cita->fecha_hora)) )
                                <a id="{{ $cita->id }}" class="consulta" href="consultaCita/{{ $cita->id }}">Atender</a>
                                /
                                @endif
                            @else
                                @if(Carbon\Carbon::now()->addMinutes(30)->gt(Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$cita->fecha_hora)) )
                                <a id="{{ $cita->id }}" class="consulta" href="consultaCita/{{ $cita->id }}">Atender</a>
                                /
                                @endif
                            @endif
                            <a id="{{ $cita->id }}" class="eliminar cita" href="#">Cancelar</a>
                        </td>
                    </tr>
                    @else
                    @php
                    $cita->delete()
                    @endphp
                    @endif
                    @endforeach
                </tbody>
            </table>
            {{ $citas->onEachSide(7)->links() }}
        </div>
    </div>

    @else
    <div class="row">
        <div class="col">
            <h3>Por el momento no hay citas por atender...</h3>
        </div>
    </div>
    @endif
    @if(!($fecha ?? false))
    <div class="row justify-content-start">
        <div class="col">
            <h2>¿Paciente nuevo? Haz click <a href="/nuevaConsulta">aquí</a> para registrarlo y darle una consulta.</h2>
        </div>
    </div>
    @endif
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    var api_token = "{{ Auth::user()->api_token }}"
</script>
<script type="text/javascript" src="{{ asset('js/citas_consultas.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/citas_proximas.js') }}"></script>
@endsection