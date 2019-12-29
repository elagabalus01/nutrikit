/*
Validaciones de front end
*/
function realizarValidaciones(){
  validarConsulta();
  var caracteristicasPaciente=validarCaracteristicasDelPaciente();
  var tabla=validarTableInput();
  var macros=validarPorcentajeMacros();
  if(caracteristicasPaciente&&tabla&&macros){
    $("#crearConsulta").attr("disabled", false);
  }
  else{
    $("#crearConsulta").attr("disabled", true);
  }
}
$(':input').on('keyup keypress change click',function(){
  realizarValidaciones();
});
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
  if(validarPorcentajeGrasa()&&
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
function validarPorcentajeMacros(){
  var valido=true;
  var suma=0;
  $(".porcentajes_macros").each(function (item){
    var valor=$(this).val();
    suma+=parseInt(valor);
    if(valor>=0 && valor<=100 && valor.length>0){
      $(this).css("background-color", "#549900");
    }
    else{
      $(this).css("background-color", "#B22222");
      valido=false;
    }
  });
  if (suma!=100){
    $('#sumaPorcentajeValid').hide();
    $('#sumaPorcentajeInvalid').show();
    valido=false;
  }else{
    $('#sumaPorcentajeInvalid').hide();
    $('#sumaPorcentajeValid').show();
  }
  return valido;
}
function validarTablas(){
  if(validarTableInput()&&validarPorcentajeMacros()){
    return true;
  }
  else{
    return false;
  }
}
//consumir api para crear consulta
function crearConsulta(){
  $.ajax({
    headers:{
      'Accept': 'application/json',
      'X-Requested-With': 'XMLHttpRequest',
      'Authorization': `Bearer ${api_token}`
    },
    url:'/api/consulta',
    type:'POST',
    data:{
      cita_id:citaID,
      grasa_porcentaje:$('#grasa_porcentaje').val(),
      musculo_porcentaje:$('#musculo_porcentaje').val(),
      hueso_kilos:$('#hueso_kilos').val(),
      agua_litros:$('#agua_litros').val(),
      observaciones:$('#observaciones').val(),
      descripcion_dieta:$('#descripcion_dieta').val(),
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
//Boton para crear consulta
$('#crearConsulta').on('click',function(){
  crearConsulta();
});
realizarValidaciones();