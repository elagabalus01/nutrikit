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
          {{ $cita->paciente->fecha_nacimiento }} 
        </label>
      </div>
    </div>

    <div class="row">
        <div class="col">
          <label>Edad: {{ $cita->paciente->edad }}</label>
          <label>Años</label>
        </div>
        <div class="col">
          <label>IMC: IMC_CALCULADO</label>
       </div>
    </div>

    <div class="form-group row">
        <div class="col">
          <label>Correo:
            {{ $cita->paciente->correo_electronico }}
            <button>Editar</button>
          </label>
        </div>        
        <div class="col">
          <label>Telefono:
            {{ $cita->paciente->telefono }}
            <button>Editar</button>
          </label>
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
        <label>Peso:
          {{ $cita->paciente->peso }}
          <label>Kg</label>
          <button>Editar</button>
        </label>
      </div>
      <div class="col">
        <label>Talla:
          {{ $cita->paciente->estatura }}
          <label>cm</label>
          <button>Editar</button>
        </label>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <label>Actividad física:
          {{ $cita->paciente->actividad_fisica }}
          <button>Editar</button>
        </label>
      </div>
      <div class="col">
        <label>Alergias:
          {{ $cita->paciente->alergias }}
          <button>Editar</button>
        </label>

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


  <div class="row">
    <div class="col">
      <h1>Consulta</h1>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <label>Dieta habitual</label>
      <br>
      <textarea rows="4" style="width:100%" name="descripcion_dieta"></textarea>
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
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/calculos_tablas.js') }}"></script>
<script type="text/javascript">
  $(':input').keyup(function(){
  validarConsulta();
  if(validarCaracteristicasDelPaciente() &&
  validarTablas()){
    $("#crearConsulta").attr("disabled", false);
  }
  else{
    $("#crearConsulta").attr("disabled", true);
  }
});

// function validarCorreo(){
//   var correo_electronico=$('#correo_electronico').val();
//   if(validarLongitudMinima(correo_electronico,4) && validarRegex(correo_electronico,/^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü0-9-_.@]+$/)){
//     $('#correo_electronicoValid').show();
//     $('#correo_electronicoInvalid').hide();
//     return true;
//   }
//   else{
//     $('#correo_electronicoValid').hide();
//     $('#correo_electronicoInvalid').show();
//     return false;
//   }
// }
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
function validarPorcentajeGrasa(){
  var grasa_porcentaje=$('#grasa_porcentaje').val();
  if(grasa_porcentaje>=1 && grasa_porcentaje<=100){
    $('#grasa_porcentajeValid').show();
    $('#grasa_porcentajeInvalid').hide();
    return true;
  }
  else{
    $('#grasa_porcentajeValid').hide();
    $('#grasa_porcentajeInvalid').show();
    return false;
  }
}
function validarPorcentajeMusculo(){
  var musculo_porcentaje=$('#musculo_porcentaje').val();
  if(musculo_porcentaje>=1 && musculo_porcentaje<=100){
    $('#musculo_porcentajeValid').show();
    $('#musculo_porcentajeInvalid').hide();
    return true;
  }
  else{
    $('#musculo_porcentajeValid').hide();
    $('#musculo_porcentajeInvalid').show();
    return false;
  }
}
function validarHuesoKilos(){
  var hueso_kilos=$('#hueso_kilos').val();
  if(hueso_kilos>=1 && hueso_kilos<=100){
    $('#hueso_kilosValid').show();
    $('#hueso_kilosInvalid').hide();
    return true;
  }
  else{
    $('#hueso_kilosValid').hide();
    $('#hueso_kilosInvalid').show();
    return false;
  }
}
function validarAguaLitros(){
  var agua_litros=$('#agua_litros').val();
  if(agua_litros>=1 && agua_litros<=100){
    $('#agua_litrosValid').show();
    $('#agua_litrosInvalid').hide();
    return true;
  }
  else{
    $('#agua_litrosValid').hide();
    $('#agua_litrosInvalid').show();
    return false;
  }
}
function validarCaracteristicasDelPaciente(){
  if(validarPeso()&&validarEstatura()&&validarActividadFisica()&&
   validarAlergias()&&validarPorcentajeGrasa()&&
   validarPorcentajeMusculo()&&validarHuesoKilos()&&
   validarAguaLitros()){
    return true;
  }
  else{
    return false;
  }
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
function validarTableInput(){
  var valido=true;
  $(".tableInput").each(function (item){
    var valor=$(this).val();
    if(valor>=0 && valor<=500 && valor.length>0){
      $(this).css("background-color", "#549900");
    }
    else{
      $(this).css("background-color", "#B22222");
      valido=false;
    }
  });
  return valido;
}
function validarTablas(){
  if(validarTableInput()){
    return true;
  }
  else{
    return false;
  }
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