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
      enfermedades:$('#enfermedades').val(),
      motivo:$('#motivo').val(),
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