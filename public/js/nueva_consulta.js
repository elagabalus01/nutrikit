/*
Validaciones de front end
*/
function ralizarValidaciones(){
  validarConsulta();
  var datosPaciente=validarDatosDelPaciente();
  var caracteristicasPaciente=validarCaracteristicasDelPaciente();
  var tablas=validarTableInput();
  var macros=validarPorcentajeMacros();
  if(datosPaciente&&caracteristicasPaciente&&tablas&&macros){
    $("#crearConsulta").attr("disabled", false);
  }
  else{
    $("#crearConsulta").attr("disabled", true);
  }
}
$(':input').on('keyup keypress change click',function(){
  ralizarValidaciones();
});
function validarRFC(){
  var rfc=$('#rfc').val();
  if(validarLongitudMinima(rfc,13) && validarRegex(rfc,/^[a-zA-Z]{4}[0-9]{6}[a-zA-Z0-9]{3}$/)){
    $('#rfcValid').show();
    $('#rfcInvalid').hide();
    return true;
  }
  else{
    $('#rfcValid').hide();
    $('#rfcInvalid').show();
    return false;
  }
}
function validarNombre(){
  var nombre=$('#nombre').val();
  if(validarLongitudMinima(nombre,4) && validarRegex(nombre,/^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü ]+$/)){
    $('#nombreValid').show();
    $('#nombreInvalid').hide();
    return true;
  }
  else{
    $('#nombreValid').hide();
    $('#nombreInvalid').show();
    return false;
  }
}

function validarCorreo(){
  var correo_electronico=$('#correo_electronico').val();
  if(validarLongitudMinima(correo_electronico,4) && validarRegex(correo_electronico,/^[a-zA-Z0-9-_.]+@[a-zA-Z0-9-_.]+\.[a-zA-Z0-9-_.]+$/)){
    $('#correo_electronicoValid').show();
    $('#correo_electronicoInvalid').hide();
    return true;
  }
  else{
    $('#correo_electronicoValid').hide();
    $('#correo_electronicoInvalid').show();
    return false;
  }
}

function validarTelefono(){
  var telefono=$('#telefono').val();
  if(validarLongitudMinima(telefono,10) && validarRegex(telefono,/^[0-9]+$/)){
    $('#telefonoValid').show();
    $('#telefonoInvalid').hide();
    return true;
  }
  else{
    $('#telefonoValid').hide();
    $('#telefonoInvalid').show();
    return false;
  }
}

function validarFechaNacimiento(){
  var fecha_nacimiento=new Date($('#fecha_nacimiento').val());
  var min_fecha=new Date($('#fecha_nacimiento').attr('min'));
  var max_fecha=new Date($('#fecha_nacimiento').attr('max'));

  if(fecha_nacimiento>min_fecha && fecha_nacimiento<max_fecha){
    $('#fecha_nacimientoValid').show();
    $('#fecha_nacimientoInvalid').hide();
    return true;
  }
  else{
    $('#fecha_nacimientoValid').hide();
    $('#fecha_nacimientoInvalid').show();
    return false;
  }
}

function validarDatosDelPaciente(){
  if(validarRFC() && validarNombre() &&
  validarTelefono()&&validarCorreo() && validarFechaNacimiento()){
    return true;
  }else{
    return false;
  }
}
function validarPeso(){
  var peso=$('#peso').val();
  if(peso>=0.5 && peso<=500){
    $('#pesoValid').show();
    $('#pesoInvalid').hide();
    return true;
  }
  else{
    $('#pesoValid').hide();
    $('#pesoInvalid').show();
    return false;
  }
}
function validarEstatura(){
  var estatura=$('#estatura').val();
  if(estatura>=1 && estatura<=255){
    $('#estaturaValid').show();
    $('#estaturaInvalid').hide();
    return true;
  }
  else{
    $('#estaturaValid').hide();
    $('#estaturaInvalid').show();
    return false;
  }
}
function validarActividadFisica(){
  var actividad_fisica=$('#actividad_fisica').val();
  if(validarRegex(actividad_fisica,/^[a-zA-Z ,ÑñÁáÉéÍíÓóÚúÜü.]+$/) || actividad_fisica.length==0){
    $('#actividad_fisicaValid').show();
    $('#actividad_fisicaInvalid').hide();
    return true;
  }
  else{
    $('#actividad_fisicaValid').hide();
    $('#actividad_fisicaInvalid').show();
    return false;
  }
}
function validarAlergias(){
  var alergias=$('#alergias').val();
  if(validarRegex(alergias,/^[a-zA-Z ,ÑñÁáÉéÍíÓóÚúÜü.]+$/) || alergias.length==0){
    $('#alergiasValid').show();
    $('#alergiasInvalid').hide();
    return true;
  }
  else{
    $('#alergiasValid').hide();
    $('#alergiasInvalid').show();
    return false;
  }
}

function validarEnfermedades(){
  var enfermedades=$('#enfermedades').val();
  if(validarRegex(enfermedades,/^[a-zA-Z ,ÑñÁáÉéÍíÓóÚúÜü.]+$/) || enfermedades.length==0){
    $('#enfermedadesValid').show();
    $('#enfermedadesInvalid').hide();
    return true;
  }
  else{
    $('#enfermedadesValid').hide();
    $('#enfermedadesInvalid').show();
    return false;
  }
}

function validarCaracteristicasDelPaciente(){
  if(validarPeso()&&validarEstatura()&&validarActividadFisica()&&
   validarAlergias()&&validarEnfermedades()&&
   validarPorcentajeGrasa()&&
   validarPorcentajeMusculo()&&validarHuesoKilos()&&
   validarAguaLitros()){
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
      enfermedades:$('#enfermedades').val(),
      motivo:$('#motivo').val(),
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
      proteinas_porcentaje:$('#proteinas_porcentaje').val(),
      hidratos_porcentaje:$('#hidratos_porcentaje').val(),
      lipidos_porcentaje:$('#lipidos_porcentaje').val(),
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
        window.location.href='/citas';
    }
  });
}
$('#crearConsulta').on('click',function(){
  crearConsulta();
});
ralizarValidaciones();