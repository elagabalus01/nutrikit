@extends('layouts.plantillaLogged')
@section('titulo')
<title>NUTRIKIT</title>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Pacientes atendidos</h1>
            <div class="row">
                @if($fecha ?? false)
                <div class="col-md-2">
                    <label>
                        Fecha:
                        {{ $fecha->format('d/m/Y') ?? '' }}
                    </label>
                </div>
                <div class="col-md-10 text-right">
                @else
                <div class="col-md-4">
                    <label>Buscar paciente</label>
                    <input maxlength="25" id="searchRfc" name="rfc" type="text" class="ui-autocomplete-input" placeholder="nombre o rfc" />
                    <button disabled="true" class="btn btn-primary" id="ver">ver</button>
                </div>
                <div class="col-md-8 text-right">
                @endif
                    <label>Fecha:</label>
                    <input min="{{ Carbon\Carbon::now()->subYears(20)->format('Y-m-d') }}" max="{{ Carbon\Carbon::now()->format('Y-m-d') }}" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" type="date" id="fechaConsultas">
                    <button class="btn btn-primary" id="irFecha">Ir</button>
                    <div id="fechaConsultasValid" class="valid-feedback">Aceptado</div>
                    <div id="fechaConsultasInvalid" class="invalid-feedback">Fecha no valida</div>   
                </div>
            </div>
        </div>
    </div>
    <div id="tablaConsultas">
        @if(count($consultas)>0)
        <div class="row justify-content-center">
            <div class="col-md-9">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Paciente</th>
                            <th>Fecha</th>
                            <th>Atendido por</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($consultas as $consulta)
                        <tr>
                            <td>
                                <a href="#" onclick="consultasAnteriores('{{ $consulta->paciente->rfc }}')">{{ $consulta->paciente->nombre }}</a>
                            </td>

                            <td>{{ $consulta->fecha }} {{ $consulta->hora }}</td>
                            <td>{{ $consulta->user->nombre }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $consultas->onEachSide(7)->links() }}
            </div>
        </div>
        @else
            @if($fecha ?? false)
            <div class="row">
                <div class="col">
                    <h3>Ese día no hubieron consultas</h3>
                </div>
            </div>
            @else
            <div class="row">
                <div class="col">
                    <h3>Aún no se han realizado consultas</h3>
                </div>
            </div>
            @endif
        @endif
    </div
></div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/citas_consultas.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/validaciones.js') }}"></script>
<script type="text/javascript">
    $('#fechaConsultas').on('keyup keypress change click',function(){
    console.log('Validadno');
      if(validarFechaConsultas()){
        $("#irFecha").attr("disabled", false);
      }
      else{
        $("#irFecha").attr("disabled", true);
      }
    });
    function validarFechaConsultas(){
      var fecha_consulta=new Date($('#fechaConsultas').val());
      var min_fecha=new Date($('#fechaConsultas').attr('min'));
      var max_fecha=new Date($('#fechaConsultas').attr('max'));

      if(fecha_consulta>min_fecha && fecha_consulta<=max_fecha){
        $('#fechaConsultasValid').show();
        $('#fechaConsultasInvalid').hide();
        return true;
      }
      else{
        $('#fechaConsultasValid').hide();
        $('#fechaConsultasInvalid').show();
        return false;
      }
    }
    $('#irFecha').click(function(){
        var fecha=$('#fechaConsultas').val().split('-').join('');
        window.location.href=`/consultas/${fecha}`;
    });
    $("#searchRfc").on('keyup keydown change click focus',function(){
      var rfc=$('#searchRfc').val();
      if(validarRegex(rfc,/^[a-zA-ZÑñÜü]{4}[0-9]{6}[a-zA-ZÑñÜü0-9]{3}$/) && validarLongitudMinima(rfc,13)){
          $("#ver").attr("disabled", false);
      }
      else{
          $("#ver").attr("disabled", true);
      }
    });
    $("#searchRfc").autocomplete({
        source: function(request, response){
            $.ajax({url: '/api/autocomplete',
                type:"post",
                data: {
                    term : request.term,
                },
                dataType: "json",
                success: function(data){
                    response(data);
                }
            });
        },
        minLength: 2,
    });
    $("#ver").click(function(){
        var rfc=$('#searchRfc').val();
        window.open(`/pacientes/${rfc}`,'_blank','toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=100,width=1100,height=700');
    });
</script>
@endsection
