@extends('layouts.plantillaNoLog')
@section('titulo')
<title>NUTRIKIT</title>
@endsection
@section('variables')
<script>var api_token = "{{ Auth::user()->api_token }}" </script>
<script>var citaID = "{{$cita->id}}" </script>
<script>var rfc = "{{$cita->paciente->rfc}}" </script>
@endsection
@section('content')

<div class="container">
    <div class="row">
      <div class="col align-self-end">
        <label class="float-right">Fecha:
        {{ $cita->fecha }}
        </label>
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
        <label>RFC: {{ $cita->paciente->rfc }}</label>
      </div>
      <div class="col">
        <label>Nombre: {{ $cita->paciente->nombre}}</label>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <label>Sexo: {{ $cita->paciente->sexo }}</label>
      </div>
      <div class="col">
        <label>Fecha de nacimiento: 
          {{ $cita->paciente->cumpleaños }} 
        </label>
      </div>
    </div>

    <div class="row">
        <div class="col">
          <label>Edad: {{ $cita->paciente->edad }}</label>
          <label>Años</label>
        </div>
        <div class="col">
          <label>IMC: {{ number_format($cita->paciente->peso/pow($cita->paciente->estatura/100,2),2) }}</label>
       </div>
    </div>

    <div class="form-group row">
        <div class="col">
          <label id="correo">Correo:
            {{ $cita->paciente->correo_electronico }}
          </label>
          <input style="display:none;" id='correo_electronico' placeholder='correo'></input>
          <button id="editarCorreo">Editar</button>
          <button style="display:none;" id='aceptarCorreo'>Aceptar</button>
          <div id="correo_electronicoValid" class="valid-feedback">Aceptado</div>
          <div id="correo_electronicoInvalid" class="invalid-feedback">Correo no valido</div>
        </div>        
        <div class="col">
          <label id="telefono">Telefono:
            {{ $cita->paciente->telefono }}
          </label>
          <button data-campo='telefono' class="editar">Editar</button>
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
        <label id="peso">Peso:
          {{ $cita->paciente->peso }}
        </label>
        <label>Kg</label>
        <button data-campo='peso' class="editar">Editar</button>
      </div>
      <div class="col">
        <label id="estatura">Talla:
          {{ $cita->paciente->estatura }}
        </label>
        <label>cm</label>
        <button data-campo='estatura' class="editar">Editar</button>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <label id="actividad_fisica">Actividad física:
          {{ $cita->paciente->actividad_fisica }}
        </label>
        <button data-campo='actividad_fisica' class="editar">Editar</button>
      </div>
      <div class="col">
        <label id="alergias">Alergias:
          {{ $cita->paciente->alergias }}
        </label>
        <button data-campo='alergias' class="editar">Editar</button>
      </div>
    </div>

    <div class="row">
        <div class="col">
          <label>Porcentaje de grasa:</label>
          <input min='0' max='100' type="number" id="grasa_porcentaje">
          <label>%</label>
          <div id="grasa_porcentajeValid" class="valid-feedback">Aceptado</div>
          <div id="grasa_porcentajeInvalid" class="invalid-feedback">Porcentaje no valido</div>
        </div>
        <div class="col">
          <label>Porcentaje de músculo:</label>
          <input min='0' max='100' type="number" id="musculo_porcentaje">
          <label>%</label>
          <div id="musculo_porcentajeValid" class="valid-feedback">Aceptado</div>
          <div id="musculo_porcentajeInvalid" class="invalid-feedback">Porcentaje no valido</div>
        </div>
    </div>

    <div class="row">
        <div class="col">
          <label>Hueso:</label>
          <input min='1' max='100' type="number" id="hueso_kilos">
          <label>kg</label>
          <div id="hueso_kilosValid" class="valid-feedback">Aceptado</div>
          <div id="hueso_kilosInvalid" class="invalid-feedback">Peso no valido</div>
        </div>
        <div class="col">
          <label>Agua:</label>
          <input min='1' max='100' type="number" id="agua_litros">
          <label>L</label>
          <div id="agua_litrosValid" class="valid-feedback">Aceptado</div>
          <div id="agua_litrosInvalid" class="invalid-feedback">Cantidad no valida</div>
        </div>
    </div>    


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
      <div id="descripcion_dietaValid" class="valid-feedback">Aceptado</div>
      <div id="descripcion_dietaInvalid" class="invalid-feedback">Sólo se aceptan hasta 1024 carácteres</div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <label>Observaciones</label>
      <br>
      <textarea rows="4" style="width:100%" id="observaciones"></textarea>
      <div id="observacionesValid" class="valid-feedback">Aceptado</div>
      <div id="observacionesInvalid" class="invalid-feedback">Sólo se aceptan hasta 1024 carácteres</div>
    </div>
  </div>
  <div class="row">
    <div class="col">
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
<script type="text/javascript" src="{{ asset('js/consulta_cita.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/calculos_tablas.js') }}"></script>
<script type="text/javascript">
console.log(rfc);
function recuperarCorreo(){
  console.log('Funcionando recuperarCorreo')
  $.ajax({
    headers:{
      'Accept': 'application/json',
      'X-Requested-With': 'XMLHttpRequest',
      'Authorization': `Bearer ${api_token}`
  },
  url:`/api/pacientes/${api_token}/correo`,
  type:'GET'
  }).done(function(response){
      if (response["success"]==true){
        console.log(response["data"])
      }
      else{
        console.log('No response')
      }
  });
}
$('#editarCorreo').click(function(){
  $(this).hide();
  $(this).siblings('#correo').hide();
  recuperarCorreo();
  $(this).siblings('#correo_electronico').show();
  $(this).siblings('#aceptarCorreo').show();
})
$('#aceptarCorreo').click(function(){
  var nuevoCorreo=$('#correo_electronico').val();
  $('#correo').html(`Correo: ${nuevoCorreo}`);
  $(this).hide();
  $(this).siblings('#correo_electronico').hide();
  $(this).siblings('#correo').show();
  $(this).siblings('#editarCorreo').show();
  $('#correo_electronicoValid').hide();
})
$('#correo_electronico').keyup(function(){
  var correo_electronico=$(this).val();
  if(validarLongitudMinima(correo_electronico,4) && validarRegex(correo_electronico,/^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü0-9-_.@]+$/)){
    $('#correo_electronicoValid').show();
    $('#correo_electronicoInvalid').hide();
    $('#aceptarCorreo').prop('disabled',false);
  }
  else{
    $('#correo_electronicoValid').hide();
    $('#correo_electronicoInvalid').show();
    $('#aceptarCorreo').prop('disabled', true);
  }
});
// function validarTelefono(){
//   var telefono=$('#telefono').val();
//   if(validarLongitudMinima(telefono,4) && validarRegex(telefono,/^[0-9]+$/)){
//     $('#telefonoValid').show();
//     $('#telefonoInvalid').hide();
//     return true;
//   }
//   else{
//     $('#telefonoValid').hide();
//     $('#telefonoInvalid').show();
//     return false;
//   }
// }
// function validarDatosDelPaciente(){
//   if(validarRFC() && validarNombre() && validarCorreo() &&
//   validarTelefono()){
//     return true;
//   }else{
//     return false;
//   }
// }
// function validarPeso(){
//   var peso=$('#peso').val();
//   if(peso>=0.5 && peso<=500){
//     $('#pesoValid').show();
//     $('#pesoInvalid').hide();
//     return true;
//   }
//   else{
//     $('#pesoValid').hide();
//     $('#pesoInvalid').show();
//     return false;
//   }
// }
// function validarEstatura(){
//   var estatura=$('#estatura').val();
//   if(estatura>=1 && estatura<=255){
//     $('#estaturaValid').show();
//     $('#estaturaInvalid').hide();
//     return true;
//   }
//   else{
//     $('#estaturaValid').hide();
//     $('#estaturaInvalid').show();
//     return false;
//   }
// }
// function validarActividadFisica(){
//   var actividad_fisica=$('#actividad_fisica').val();
//   if(validarRegex(actividad_fisica,/^[a-zA-Z ,]+$/) || actividad_fisica.length==0){
//     $('#actividad_fisicaValid').show();
//     $('#actividad_fisicaInvalid').hide();
//     return true;
//   }
//   else{
//     $('#actividad_fisicaValid').hide();
//     $('#actividad_fisicaInvalid').show();
//     return false;
//   }
// }
// function validarAlergias(){
//   var alergias=$('#alergias').val();
//   if(validarRegex(alergias,/^[a-zA-Z ,]+$/) || alergias.length==0){
//     $('#alergiasValid').show();
//     $('#alergiasInvalid').hide();
//     return true;
//   }
//   else{
//     $('#alergiasValid').hide();
//     $('#alergiasInvalid').show();
//     return false;
//   }
// }

</script>
@endsection
