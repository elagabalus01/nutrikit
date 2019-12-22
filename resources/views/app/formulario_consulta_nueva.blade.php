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
        <input type="text" name="rfc">
      </div>
      <div class="col">
        <label>Nombre:</label>
        <input class="inputNombre" type="text" name="nombre">
      </div>
    </div>

    <div class="row">
      <div class="col">
        <label>Sexo:</label>
        <select name="genero">
          <option value="femenino">Femenino</option>
          <option value="masculino">Masculino</option>
          <option value="otro">Otro</option>
        </select>
      </div>
      <div class="col">
        <label>Teléfono:</label>
        <input type="tel" name="telefono">
      </div>
    </div>

    <div class="row">
        <div class="col">
          <label>Correo:</label>
          <input type="email" name="correo">
        </div>
        <div class="col">
          <label>Fecha de nacimiento:</label>
          <input class="form-control" type="date" value="1964-12-04" id="fecha_nacimiento">
       </div>
    </div>

    <div class="form-group row">
        <div class="col">
          <label>Edad: EDAD_CALCULADO</label>
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
        <input min='0.5' max='500' class="inputEdad" type="number" name="peso_actual">
        <label>Kg</label>
      </div>
      <div class="col">
        <label>Talla:</label>
        <input min='1' max='255' class="inputEdad" type="number" name="estatura_actual">
        <label>cm</label>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <label>Actividad física:</label>
        <input type="text" name="actividad_fisica_actual">
      </div>
      <div class="col">
        <label>Alergias:</label>
        <input type="text" name="alergias">
      </div>
    </div>

    <div class="row">
        <div class="col">
          <label>Porcentaje de grasa:</label>
          <input min='0' max='100' type="number" name="grasa_porcentaje">
          <label>%</label>
        </div>
        <div class="col">
          <label>Porcentaje de músculo:</label>
          <input min='0' max='100' type="number" name="musculo_porcentaje">
          <label>%</label>
        </div>
    </div>

    <div class="row">
        <div class="col">
          <label>Hueso:</label>
          <input min='1' max='100' type="number" name="hueso_kilos">
          <label>kg</label>
        </div>
        <div class="col">
          <label>Agua:</label>
          <input min='1' max='100' type="number" name="agua_litros">
          <label>L</label>
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
        <textarea rows="4" style="width:100%" name="dietaHabitual"></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <label>Observaciones</label>
        <br>
        <textarea rows="4" style="width:100%" name="observaciones"></textarea>
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
        <button onclick="window.location.href='/app';" class="btn btn-primary float-right">Aceptar</button>
      </div>
    </div>
    <div>
      <br>
    </div>
</div>
@endsection
@section('scripts')
<<<<<<< HEAD
<script type="text/javascript" src="{{ asset('api.js') }}"></script>
=======
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
>>>>>>> 7de675b3464ab12260feb0ad03c2702aaa439f7d
@endsection