@extends('layouts.plantillaLogged')
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
                    <input min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" max="{{ Carbon\Carbon::now()->addYears(20)->format('Y-m-d') }}" value="{{ $fecha->format('Y-m-d')  }}" type="date" id="fechaCitas">
                    @else
                    <input min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" max="{{ Carbon\Carbon::now()->addYears(20)->format('Y-m-d') }}" value="{{  Carbon\Carbon::now()->format('Y-m-d') }}" type="date" id="fechaCitas">
                    @endif
                    <button class="btn btn-primary" id="irFecha">Ir</button>
                    <div id="fechaCitasValid" class="valid-feedback">Aceptado</div>
                    <div id="fechaCitasInvalid" class="invalid-feedback">Fecha no valida</div>   
                </div>
            <!-- <label id="insertar">Mi texto</label>
            <button id="append">Change</button> -->
            </div>
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
                            @if($fecha ?? false)
                                @if($fecha->isToday())
                                <a id="{{ $cita->id }}" class="consulta" href="consultaCita/{{ $cita->id }}">Atender</a>
                                /
                                @endif
                            @else
                            <a id="{{ $cita->id }}" class="consulta" href="consultaCita/{{ $cita->id }}">Atender</a>
                            /
                            @endif
                            <a id="{{ $cita->id }}" class="eliminar cita" href="#">Cancelar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $citas->onEachSide(7)->links() }}
        </div>
    </div>

    @else
    <div class="row">
        <div class="col">
            <h3>No hay citas por atender</h3>
        </div>
    </div>
    @endif
    @if(!($fecha ?? false))
    <div class="row justify-content-start">
        <div class="col">
            <h2>¿Sin previa cita? Haz click <a href="/nuevaConsulta">aqui</a></h2>
        </div>
    </div>
    @endif
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/citas_consultas.js') }}"></script>
<!-- <script>
    $('#append').on('click',function(){
        $('.container').html('<div class="row">'+
        '<div class="col">'+
            '<h1>Próximas citas</h1>'+
            '<label id="insertar">Mi texto</label>'+
            '<button id="append">Change</button>'+
        '</div>'+
    '</div>'+
            '@if(count($citas)>0)'+
    '<div class="row justify-content-center">'+
        '<div class="col-md-9">'+
            '<table class="table">'+
                '<thead>'+
                    '<tr>'+
                        '<th>Paciente</th>'+
                        '<th>Fecha</th>'+
                        '<th>Acciones</th>'+
                    '</tr>'+
                '</thead>'+
                '<tbody>'+
                    '@foreach($citas as $cita)'+
                    '<tr>'+
                        '<td>'+
                            '<a href="#" onclick="consultasAnteriores(\'{{ $cita->paciente->rfc }}\')">{{ $cita->paciente->nombre }}</a>'+
                        '</td>'+
                        '<td>{{ $cita->fecha }} {{ $cita->hora }}</td>'+
                        '<td>'+
                            '<a id="{{ $cita->id }}" class="consulta" href="consulta/{{ $cita->id }}">Atender?</a>'+
                            '/'+
                            '<a id="{{ $cita->id }}" class="eliminar cita" href="#">Cancelar</a>'+
                        '</td>'+
                    '</tr>'+
                    '@endforeach'+
                '</tbody>'+
            '</table>'+
        '</div>'+
    '</div>'+
    '@else'+
    '<div class="row">'+
        '<div class="col">'+
            '<h3>No hay citas por atender hoy</h3>'+
        '</div>'+
    '</div>'+
    '@endif')
    });
</script> -->
<script type="text/javascript">
    <script>var api_token = "{{ Auth::user()->api_token }}" </script>
<script type="text/javascript">
    $('#fechaCitas').on('keyup keypress change click',function(){
      if(validarFechaConsultas()){
        $("#irFecha").attr("disabled", false);
      }
      else{
        $("#irFecha").attr("disabled", true);
      }
    });
    function validarFechaConsultas(){
      var fecha_consulta=new Date($('#fechaCitas').val());
      var min_fecha=new Date($('#fechaCitas').attr('min'));
      var max_fecha=new Date($('#fechaCitas').attr('max'));

      if(fecha_consulta>=min_fecha && fecha_consulta<=max_fecha){
        $('#fechaCitasValid').show();
        $('#fechaCitasInvalid').hide();
        return true;
      }
      else{
        $('#fechaCitasValid').hide();
        $('#fechaCitasInvalid').show();
        return false;
      }
    }
    $('#irFecha').click(function(){
        var fecha=$('#fechaCitas').val().split('-').join('');
        window.location.href=`/citas/${fecha}`;
    });
</script>
@endsection