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
        <input type="text" id="rfc">
      </div>
      <div class="col">
        <label>Nombre:</label>
        <input maxlength="64" class="inputNombre" type="text" id="nombre">
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
        <input type="tel" id="telefono">
      </div>
    </div>

    <div class="row">
        <div class="col">
          <label>Correo:</label>
          <input type="email" id="correo_electronico">
        </div>
        <div class="col">
          <label>Fecha de nacimiento:</label>
          <input type="date" max="{{ Carbon\Carbon::now()->format('Y-m-d') }}" value="{{ Carbon\Carbon::now()->subYears(30)->format('Y-m-d') }}" id="fecha_nacimiento">
       </div>
    </div>

    <div class="form-group row">
        <div class="col">
          <label>Edad: EDAD_CALCULADO</label>
        </div>
        <div class="col">
          <label>IMC: IMC_CALCULADO</label>
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
        <input min='0.5' max='500' class="inputEdad" type="number" id="peso">
        <label>kg</label>
      </div>
      <div class="col">
        <label>Talla:</label>
        <input min='1' max='255' class="inputEdad" type="number" id="estatura">
        <label>cm</label>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <label>Actividad física:</label>
        <input type="text" id="actividad_fisica">
      </div>
      <div class="col">
        <label>Alergias:</label>
        <input type="text" id="alergias">
      </div>
    </div>

    <div class="row">
        <div class="col">
          <label>Porcentaje de grasa:</label>
          <input min='0' max='100' type="number" id="grasa_porcentaje">
          <label>%</label>
        </div>
        <div class="col">
          <label>Porcentaje de músculo:</label>
          <input min='0' max='100' type="number" id="musculo_porcentaje">
          <label>%</label>
        </div>
    </div>

    <div class="row">
        <div class="col">
          <label>Hueso:</label>
          <input min='1' max='100' type="number" id="hueso_kilos">
          <label>kg</label>
        </div>
        <div class="col">
          <label>Agua:</label>
          <input min='1' max='100' type="number" id="agua_litros">
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
        <textarea rows="4" style="width:100%" id="descripcion_dieta"></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <label>Observaciones</label>
        <br>
        <textarea rows="4" style="width:100%" id="observaciones"></textarea>
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
        <button id="crearConsulta" class="btn btn-primary float-right">Aceptar</button>
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
<script type="text/javascript" src="{{ asset('api.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/validaciones.js') }}"></script>
<!-- <script type="text/javascript" src="{{ asset('js/nueva_consulta.js') }}"></script> -->
<script type="text/javascript">
  function crearConsulta(){
    $.ajax({
      headers:{
        'Accept': 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
        'Authorization': `Bearer ${api_token}`
    },
    url:'api/consulta',
    type:'POST',
    data:{
        rfc:$('#rfc').val(),
        nombre:$('#nombre').val(),
        estatura:$('#estatura').val(),
        peso:$('#peso').val(),
        fecha_nacimiento:$('#fecha_nacimiento').val(),
        sexo:$('#sexo').val(),
        alergias:$('#alergias').val(),
        observaciones:$('#observaciones').val(),
        descripcion_dieta:$('#descripcion_dieta').val(),
        actividad_fisica:$('#actividad_fisica').val(),
        dieta_cereales:$('#dieta_cereales').val(),
        dieta_leguminosas:$('#dieta_leguminosas').val(),
        dieta_verduras:$('#dieta_verduras').val(),
        dieta_frutas:$('#dieta_frutas').val(),
        dieta_carnes:$('#dieta_carnes').val(),
        dieta_lacteos:$('#dieta_lacteos').val(),
        dieta_grasas:$('#dieta_grasas').val(),
        dieta_azucares:$('#dieta_azucares').val(),
        plan_cereales:$('#plan_cereales').val(),
        plan_leguminosas:$('#plan_leguminosas').val(),
        plan_verduras:$('#plan_verduras').val(),
        plan_frutas:$('#plan_frutas').val(),
        plan_carnes:$('#plan_carnes').val(),
        plan_lacteos:$('#plan_lacteos').val(),
        plan_grasas:$('#plan_grasas').val(),
        plan_azucares:$('#plan_azucares').val(),
        correo_electronico:$('#correo_electronico').val(),
        telefono:$('#telefono').val(),
        grasa_porcentaje:$('#grasa_porcentaje').val(),
        musculo_porcentaje:$('#musculo_porcentaje').val(),
        hueso_kilos:$('#hueso_kilos').val(),
        agua_litros:$('#agua_litros').val(),
    }
    }).done(function(response){
        if (response["success"]==false){
            $('#errorMessage').empty();
            $('#errorMessage').append(response['message']);
            $('#errorGenerico').modal();
        }
        else{
            $('#successMessage').empty();
            $('#successMessage').append('La consulta fue almacenada correctamente');
            $('#successGenerico').modal();
            window.location.href='/app';
        }
    });
}
$('#crearConsulta').on('click',function(){
  console.log('Creando cita');
  crearConsulta();
});
</script>
@endsection