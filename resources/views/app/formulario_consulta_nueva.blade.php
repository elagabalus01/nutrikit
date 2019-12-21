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
<script type="text/javascript" src="{{ asset('js/validaciones.js') }}"></script>
<!-- <script type="text/javascript" src="{{ asset('js/nueva_consulta.js') }}"></script> -->
<script type="text/javascript">
  $(':input').keyup(function(){
    validarDatosDelPaciente();
    validarCaracteristicasDelPaciente();
    validarConsulta();
  });
  function validarRFC(){
    var rfc=$('#rfc').val();
    if(validarLongitudMinima(rfc,13) && validarRegex(rfc,/^[a-zA-Z0-9]+$/)){
      $('#rfcValid').show();
      $('#rfcInvalid').hide();
    }
    else{
      $('#rfcValid').hide();
      $('#rfcInvalid').show();
    }
  }
  function validarNombre(){
    var nombre=$('#nombre').val();
    if(validarLongitudMinima(nombre,4) && validarRegex(nombre,/^[a-zA-Z ]+$/)){
      $('#nombreValid').show();
      $('#nombreInvalid').hide();
    }
    else{
      $('#nombreValid').hide();
      $('#nombreInvalid').show();
    }
  }
  function validarCorreo(){
    var correo_electronico=$('#correo_electronico').val();
    if(validarLongitudMinima(correo_electronico,4) && validarRegex(correo_electronico,/^[a-zA-Z0-9-_.@]+$/)){
      $('#correo_electronicoValid').show();
      $('#correo_electronicoInvalid').hide();
    }
    else{
      $('#correo_electronicoValid').hide();
      $('#correo_electronicoInvalid').show();
    }
  }
  function validarTelefono(){
    var telefono=$('#telefono').val();
    if(validarLongitudMinima(telefono,4) && validarRegex(telefono,/^[a-zA-Z0-9-_.@]+$/)){
      $('#telefonoValid').show();
      $('#telefonoInvalid').hide();
    }
    else{
      $('#telefonoValid').hide();
      $('#telefonoInvalid').show();
    }
  }
  function validarDatosDelPaciente(){
    validarRFC();
    validarNombre();
    validarCorreo();
    validarTelefono();
  }
  function validarPeso(){
    var peso=$('#peso').val();
    if(peso>=0.5 && peso<=500){
      $('#pesoValid').show();
      $('#pesoInvalid').hide();
    }
    else{
      $('#pesoValid').hide();
      $('#pesoInvalid').show();
    }
  }
  function validarEstatura(){
    var estatura=$('#estatura').val();
    if(estatura>=1 && estatura<=255){
      $('#estaturaValid').show();
      $('#estaturaInvalid').hide();
    }
    else{
      $('#estaturaValid').hide();
      $('#estaturaInvalid').show();
    }
  }
  function validarActividadFisica(){
    var actividad_fisica=$('#actividad_fisica').val();
    if(validarRegex(actividad_fisica,/^[a-zA-Z ,]+$/) || actividad_fisica.length==0){
      $('#actividad_fisicaValid').show();
      $('#actividad_fisicaInvalid').hide();
    }
    else{
      $('#actividad_fisicaValid').hide();
      $('#actividad_fisicaInvalid').show();
    }
  }
  function validarAlergias(){
    var alergias=$('#alergias').val();
    if(validarRegex(alergias,/^[a-zA-Z ,]+$/) || alergias.length==0){
      $('#alergiasValid').show();
      $('#alergiasInvalid').hide();
    }
    else{
      $('#alergiasValid').hide();
      $('#alergiasInvalid').show();
    }
  }
  function validarPorcentajeGrasa(){
    var grasa_porcentaje=$('#grasa_porcentaje').val();
    if(grasa_porcentaje>=1 && grasa_porcentaje<=100){
      $('#grasa_porcentajeValid').show();
      $('#grasa_porcentajeInvalid').hide();
    }
    else{
      $('#grasa_porcentajeValid').hide();
      $('#grasa_porcentajeInvalid').show();
    }
  }
  function validarPorcentajeMusculo(){
    var musculo_porcentaje=$('#musculo_porcentaje').val();
    if(musculo_porcentaje>=1 && musculo_porcentaje<=100){
      $('#musculo_porcentajeValid').show();
      $('#musculo_porcentajeInvalid').hide();
    }
    else{
      $('#musculo_porcentajeValid').hide();
      $('#musculo_porcentajeInvalid').show();
    }
  }
  function validarHuesoKilos(){
    var hueso_kilos=$('#hueso_kilos').val();
    if(hueso_kilos>=1 && hueso_kilos<=100){
      $('#hueso_kilosValid').show();
      $('#hueso_kilosInvalid').hide();
    }
    else{
      $('#hueso_kilosValid').hide();
      $('#hueso_kilosInvalid').show();
    }
  }
  function validarAguaLitros(){
    var agua_litros=$('#agua_litros').val();
    if(agua_litros>=1 && agua_litros<=100){
      $('#agua_litrosValid').show();
      $('#agua_litrosInvalid').hide();
    }
    else{
      $('#agua_litrosValid').hide();
      $('#agua_litrosInvalid').show();
    }
  }
  function validarCaracteristicasDelPaciente(){
     validarPeso();
     validarEstatura();
     validarActividadFisica();
     validarAlergias();
     validarPorcentajeGrasa();
     validarPorcentajeMusculo();
     validarHuesoKilos();
     validarAguaLitros();
  }
  function validarDescripcionDieta(){
    var descripcion_dieta=$('#descripcion_dieta').val();
    if(descripcion_dieta.length<1024){
      $('#descripcion_dietaValid').show();
      $('#descripcion_dietaInvalid').hide();
    }
    else{
      $('#descripcion_dietaValid').hide();
      $('#descripcion_dietaInvalid').show();
    }
  }
  function validarObservaciones(){
    var observaciones=$('#observaciones').val();
    if(observaciones.length<1024){
      $('#observacionesValid').show();
      $('#observacionesInvalid').hide();
    }
    else{
      $('#observacionesValid').hide();
      $('#observacionesInvalid').show();
    }
  }
  function validarConsulta(){
    validarDescripcionDieta();
    validarObservaciones();
  }
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
  crearConsulta();
});
</script>
@endsection