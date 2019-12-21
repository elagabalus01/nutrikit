@extends('layouts.plantillaNoLog')
@section('titulo')
    <title>NUTRIKIT</title>
@endsection
@section('variables')
<script>var api_token = "{{ Auth::user()->api_token }}" </script>
@endsection
@section('content')
<div class="container">
    <div class="row">
      <div class="col align-self-end">
        <p class="float-right">Fecha:
        {{ Carbon\Carbon::now()->format('d/m/Y') }}
        </p>
      </div>
    </div>
 
<!-- Datos del paciente --> 

    <div class="row">
      <div class="col">
        <h1>Datos del paciente</h1>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <label>RFC:</label>
        <input maxlength="13" type="text" id="rfc">
        <div id="rfcValid" class="valid-feedback">Aceptado</div>
        <div id="rfcInvalid" class="invalid-feedback">RFC no valido</div>
      </div>
      <div class="col">
        <label>Nombre:</label>
        <input maxlength="64" class="inputNombre" type="text" id="nombre">
        <div id="nombreValid" class="valid-feedback">Aceptado</div>
        <div id="nombreInvalid" class="invalid-feedback">Nombre no valido</div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <label>Sexo:</label>
        <select id="sexo">
          <option value="femenino">Femenino</option>
          <option value="masculino">Masculino</option>
          <option value="otro">Otro</option>
        </select>
      </div>
      <div class="col">
        <label>Teléfono:</label>
        <input maxlength="10" type="tel" id="telefono">
        <div id="telefonoValid" class="valid-feedback">Aceptado</div>
        <div id="telefonoInvalid" class="invalid-feedback">Telefono no valido</div>
      </div>
    </div>

    <div class="row">
        <div class="col">
          <label>Correo:</label>
          <input type="email" id="correo_electronico">
          <div id="correo_electronicoValid" class="valid-feedback">Aceptado</div>
          <div id="correo_electronicoInvalid" class="invalid-feedback">Correo no valido</div>
        </div>
        <div class="col">
          <label>Fecha de nacimiento:</label>
          <input type="date" max="{{ Carbon\Carbon::now()->format('Y-m-d') }}" value="{{ Carbon\Carbon::now()->subYears(30)->format('Y-m-d') }}" id="fecha_nacimiento">
       </div>
    </div>

    <div class="form-group row">
        <div class="col">
          <label id="edad">Edad: EDAD_CALCULADO</label>
        </div>
        <div class="col">
          <label id="imc">IMC: -</label>
        </div>
    </div>

    <!-- Características del paciente --> 
    
    <div class="row">
      <div class="col">
        <h1>Características del paciente</h1>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <label>Peso:</label>
        <input min='0.5' max='500' step="0.01" class="inputEdad" type="number" id="peso">
        <label>kg</label>
        <div id="pesoValid" class="valid-feedback">Aceptado</div>
        <div id="pesoInvalid" class="invalid-feedback">Peso no valido</div>
      </div>
      <div class="col">
        <label>Talla:</label>
        <input min='1' max='255' step="1" class="inputEdad" type="number" id="estatura">
        <label>cm</label>
        <div id="estaturaValid" class="valid-feedback">Aceptado</div>
        <div id="estaturaInvalid" class="invalid-feedback">Estatura no valida</div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <label>Actividad física:</label>
        <input maxlength="100" type="text" id="actividad_fisica">
        <div id="actividad_fisicaValid" class="valid-feedback">Aceptado</div>
        <div id="actividad_fisicaInvalid" class="invalid-feedback">Texto no valido</div>
      </div>
      <div class="col">
        <label>Alergias:</label>
        <input maxlength="100" type="text" id="alergias">
        <div id="alergiasValid" class="valid-feedback">Aceptado</div>
        <div id="alergiasInvalid" class="invalid-feedback">Texto no valido</div>
      </div>
    </div>

    <div class="row">
        <div class="col">
          <label>Porcentaje de grasa:</label>
          <input min='1' step="0.01" max='100' type="number" id="grasa_porcentaje">
          <label>%</label>
          <div id="grasa_porcentajeValid" class="valid-feedback">Aceptado</div>
          <div id="grasa_porcentajeInvalid" class="invalid-feedback">Porcentaje no valido</div>
        </div>
        <div class="col">
          <label>Porcentaje de músculo:</label>
          <input min='0' step="0.01" max='100' type="number" id="musculo_porcentaje">
          <label>%</label>
          <div id="musculo_porcentajeValid" class="valid-feedback">Aceptado</div>
          <div id="musculo_porcentajeInvalid" class="invalid-feedback">Porcentaje no valido</div>
        </div>
    </div>

    <div class="row">
        <div class="col">
          <label>Hueso:</label>
          <input min='1' step="0.01" max='100' type="number" id="hueso_kilos">
          <label>kg</label>
          <div id="hueso_kilosValid" class="valid-feedback">Aceptado</div>
          <div id="hueso_kilosInvalid" class="invalid-feedback">Peso no valido</div>
        </div>
        <div class="col">
          <label>Agua:</label>
          <input min='1.0' step="0.01" max='100' type="number" id="agua_litros">
          <label>L</label>
          <div id="agua_litrosValid" class="valid-feedback">Aceptado</div>
          <div id="agua_litrosInvalid" class="invalid-feedback">Cantidad no valida</div>
        </div>
    </div>    

 <!--Empiezan datos de consulta --> 

    <div class="row">
      <div class="col">
        <h1>Consulta</h1>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <label>Dieta habitual</label>
        <br>
        <textarea maxlength="1024" rows="4" style="width:100%" id="descripcion_dieta"></textarea>
        <div id="descripcion_dietaValid" class="valid-feedback">Aceptado</div>
        <div id="descripcion_dietaInvalid" class="invalid-feedback">Sólo se aceptan hasta 1024 carácteres</div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <label>Observaciones</label>
        <br>
        <textarea maxlength="1024" rows="4" style="width:100%" id="observaciones"></textarea>
        <div id="observacionesValid" class="valid-feedback">Aceptado</div>
        <div id="observacionesInvalid" class="invalid-feedback">Sólo se aceptan hasta 1024 carácteres</div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        @include('app.componentes.tablas_formularios.tablaHabitualPlan')
      </div>
    </div>
    <div class="row">
      <div class="col-md-7">
        @include('app.componentes.tablas_formularios.tablaCalculoCalorias')
      </div>
      <div class="col-md-5">
        @include('app.componentes.tablas_formularios.tabla_cal_res_final')
      </div>
    </div>
    <div class="row justify-content-end">
      <div class="col col-lg-1">
        <button onclick="window.location.href='/app';" class="btn btn-danger float-right">Cancelar</button>
      </div>
      <div class="col col-lg-1">
        <button disabled="true" id="crearConsulta" class="btn btn-primary float-right">Aceptar</button>
      </div>
    </div>
    <div>
      <br>
    </div>
</div>
@include('app.componentes.mensajes.modalError')
@include('app.componentes.mensajes.modalSuccess')
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/validaciones.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/nueva_consulta.js') }}"></script>
<script type="text/javascript">
  function calcularIMC(){
    var imc=$('#peso').val()/Math.pow($('#estatura').val()/100,2);
    if($('#estatura').val()>0){
      $('#imc').html(`IMC: ${imc.toFixed(2)}`);
    }
  }
  $('#estatura,#peso').change(function(){
    calcularIMC();
  });
  $('#plan_cereales').change(function(){
    var valor=$(this).val();
    $('#plan_cereales_copia').html(valor);
    $("#energia_cereales").html(valor*70);
    $("#proteina_cereales").html(valor*2);
    $("#lipidos_cereales").html(valor*2);
    $("#hidratos_cereales").html(valor*15);

  });
  $('#plan_leguminosas').change(function(){
    var valor=$(this).val();
    $('#plan_leguminosas_copia').html($(this).val());
    $("#energia_leguminosas").html(valor*105);
    $("#proteina_leguminosas").html(valor*6);
    $("#lipidos_leguminosas").html(valor*1);
    $("#hidratos_leguminosas").html(valor*18);
  });
  $('#plan_verduras').change(function(){
    var valor=$(this).val();
    $('#plan_verduras_copia').html($(this).val())
    $("#energia_verduras").html(valor*25);
    $("#proteina_verduras").html(valor*2);
    $("#lipidos_verduras").html(valor*0);
    $("#hidratos_verduras").html(valor*4);
  });
  $('#plan_frutas').change(function(){
    var valor=$(this).val();
    $('#plan_frutas_copia').html($(this).val())
    $("#energia_frutas").html(valor*60);
    $("#proteina_frutas").html(valor*0);
    $("#lipidos_frutas").html(valor*0);
    $("#hidratos_frutas").html(valor*12);
  });
  $('#plan_carnes').change(function(){
    var valor=$(this).val();
    $('#plan_carnes_copia').html($(this).val())
    $("#energia_carnes").html(valor*75);
    $("#proteina_carnes").html(valor*7);
    $("#lipidos_carnes").html(valor*5);
    $("#hidratos_carnes").html(valor*0);
  });
  $('#plan_lacteos').change(function(){
    var valor=$(this).val();
    $('#plan_lacteos_copia').html($(this).val())
    $("#energia_lacteos").html(valor*145);
    $("#proteina_lacteos").html(valor*9);
    $("#lipidos_lacteos").html(valor*8);
    $("#hidratos_lacteos").html(valor*12);
  });
  $('#plan_grasas').change(function(){
    var valor=$(this).val();
    $('#plan_grasas_copia').html($(this).val())
    $("#energia_grasas").html(valor*45);
    $("#proteina_grasas").html(valor*0);
    $("#lipidos_grasas").html(valor*5);
    $("#hidratos_grasas").html(valor*0);
  });
  $('#plan_azucares').change(function(){
    var valor=$(this).val();
    $('#plan_azucares_copia').html($(this).val())
    $("#energia_azucares").html(valor*20);
    $("#proteina_azucares").html(valor*0);
    $("#lipidos_azucares").html(valor*0);
    $("#hidratos_azucares").html(valor*10);
  });
  $("table").change(function(){
    var total=0;

    $("tr:not(:last-child) td:nth-child(3)").each(function () {
        var val = $(this).text();
        console.log(val);
        // total += parseInt(val);
    });
    console.log(total);
});
</script>
@endsection