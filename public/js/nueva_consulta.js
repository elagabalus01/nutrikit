$(':input').keyup(function(){
  validarConsulta();
  if(validarDatosDelPaciente() &&
  validarCaracteristicasDelPaciente() &&
  validarTablas()){
    $("#crearConsulta").attr("disabled", false);
  }
  else{
    $("#crearConsulta").attr("disabled", true);
  }
});
function validarRFC(){
  var rfc=$('#rfc').val();
  if(validarLongitudMinima(rfc,13) && validarRegex(rfc,/^[a-zA-Z0-9]+$/)){
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
  if(validarLongitudMinima(nombre,4) && validarRegex(nombre,/^[a-zA-Z ]+$/)){
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
  if(validarLongitudMinima(correo_electronico,4) && validarRegex(correo_electronico,/^[a-zA-Z0-9-_.@]+$/)){
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
  if(validarLongitudMinima(telefono,4) && validarRegex(telefono,/^[a-zA-Z0-9-_.@]+$/)){
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
function validarDatosDelPaciente(){
  if(validarRFC() && validarNombre() && validarCorreo() &&
  validarTelefono()){
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
  if(validarRegex(actividad_fisica,/^[a-zA-Z ,]+$/) || actividad_fisica.length==0){
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
  if(validarRegex(alergias,/^[a-zA-Z ,]+$/) || alergias.length==0){
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