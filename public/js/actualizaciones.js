/*
Actualizacion del correo electronico con validacion de frontend
*/
function recuperarCorreo(){
  $.ajax({
    headers:{
      'Accept': 'application/json',
      'X-Requested-With': 'XMLHttpRequest',
      'Authorization': `Bearer ${api_token}`
    },
    url:`/api/pacientes/${rfc}/correo`,
    type:'GET'
  }).done(function(response){
    if (response["success"]==true){
      $('#correo_electronico').val(response["data"]);
    }
    else{
      console.log('No response')
    }
  });
}
function actualizarCorreo(nuevoCorreo){
  $.ajax({
    headers:{
      'Accept': 'application/json',
      'X-Requested-With': 'XMLHttpRequest',
      'Authorization': `Bearer ${api_token}`
    },
    url:`/api/pacientes/${rfc}/correo`,
    type:'POST',
    data:{correo:nuevoCorreo}
  }).done(function(response){
    if (response["success"]==true){
      console.log('Funciono la actualizarCorreo')
    }
    else{
      console.log('No funciono')
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
  actualizarCorreo(nuevoCorreo);
})
$('#correo_electronico').keyup(function(){
  var correo_electronico=$(this).val();
  if(validarLongitudMinima(correo_electronico,4) && validarRegex(correo_electronico,/^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü0-9-_.]+@[a-zA-ZÑñÁáÉéÍíÓóÚúÜü0-9-_.]+$/)){
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
/*
Actualizacion del numero telefonico con validacion de frontend
*/
function recuperarTel(){
  $.ajax({
    headers:{
      'Accept': 'application/json',
      'X-Requested-With': 'XMLHttpRequest',
      'Authorization': `Bearer ${api_token}`
    },
    url:`/api/pacientes/${rfc}/telefono`,
    type:'GET'
  }).done(function(response){
    if (response["success"]==true){
      $('#telefono').val(response["data"]);
    }
    else{
      console.log('No response')
    }
  });
}
function actualizarTel(nuevoTel){
  $.ajax({
    headers:{
      'Accept': 'application/json',
      'X-Requested-With': 'XMLHttpRequest',
      'Authorization': `Bearer ${api_token}`
    },
    url:`/api/pacientes/${rfc}/telefono`,
    type:'POST',
    data:{telefono:nuevoTel}
  }).done(function(response){
    if (response["success"]==true){
    }
    else{
      console.log('No funciono')
    }
  });
}
$('#editarTel').click(function(){
  $(this).hide();
  $(this).siblings('#tel').hide();
  recuperarTel();
  $(this).siblings('#telefono').show();
  $(this).siblings('#aceptarTel').show();
})
$('#aceptarTel').click(function(){
  var nuevoTel=$('#telefono').val();
  $('#tel').html(`Telefono: ${nuevoTel}`);
  $(this).hide();
  $(this).siblings('#telefono').hide();
  $(this).siblings('#tel').show();
  $(this).siblings('#editarTel').show();
  $('#telefonoValid').hide();
  actualizarTel(nuevoTel);
})
$('#telefono').keyup(function(){
  var telefono=$('#telefono').val();
  if(validarLongitudMinima(telefono,10) && validarRegex(telefono,/^[0-9]+$/)){
    $('#telefonoValid').show();
    $('#telefonoInvalid').hide();
    $('#aceptarTel').prop('disabled',false);
  }
  else{
    $('#telefonoValid').hide();
    $('#telefonoInvalid').show();
    $('#aceptarTel').prop('disabled',true);
  }
})
/*
Actualizacion del peso con validacion de frontend
*/
function recuperarPeso(){
  $.ajax({
    headers:{
      'Accept': 'application/json',
      'X-Requested-With': 'XMLHttpRequest',
      'Authorization': `Bearer ${api_token}`
    },
    url:`/api/pacientes/${rfc}/peso`,
    type:'GET'
  }).done(function(response){
    if (response["success"]==true){
      $('#peso').val(response["data"]);
    }
    else{
      console.log('No response')
    }
  });
}
function actualizarPeso(nuevoPeso){
  $.ajax({
    headers:{
      'Accept': 'application/json',
      'X-Requested-With': 'XMLHttpRequest',
      'Authorization': `Bearer ${api_token}`
    },
    url:`/api/pacientes/${rfc}/peso`,
    type:'POST',
    data:{peso:nuevoPeso}
  }).done(function(response){
    if (response["success"]==true){
    }
    else{
      console.log('No funciono')
    }
  });
}
$('#editarPeso').click(function(){
  $(this).hide();
  $(this).siblings('#peso_old').hide();
  recuperarPeso();
  $(this).siblings('#peso').show();
  $(this).siblings('#aceptarPeso').show();
})
$('#aceptarPeso').click(function(){
  var nuevoPeso=$('#peso').val();
  $('#peso_old').html(`Peso: ${nuevoPeso}`);
  $(this).hide();
  $(this).siblings('#peso').hide();
  $(this).siblings('#peso_old').show();
  $(this).siblings('#editarPeso').show();
  $('#pesoValid').hide();
  actualizarPeso(nuevoPeso);
})
$('#peso').keyup(function(){
  var peso=$('#peso').val();
  if(peso>=0.5 && peso<=500){
    $('#pesoValid').show();
    $('#pesoInvalid').hide();
    $('#aceptarPeso').prop('disabled',false);
  }
  else{
    $('#pesoValid').hide();
    $('#pesoInvalid').show();
    $('#aceptarPeso').prop('disabled',true);
  }
})
/*
Actualizacion de la estatura con validaciones en el frontend
*/
function recuperarEstatura(){
  $.ajax({
    headers:{
      'Accept': 'application/json',
      'X-Requested-With': 'XMLHttpRequest',
      'Authorization': `Bearer ${api_token}`
    },
    url:`/api/pacientes/${rfc}/estatura`,
    type:'GET'
  }).done(function(response){
    if (response["success"]==true){
      $('#estatura').val(response["data"]);
    }
    else{
      console.log('No response')
    }
  });
}
function actualizarEstatura(nuevaEstatura){
  $.ajax({
    headers:{
      'Accept': 'application/json',
      'X-Requested-With': 'XMLHttpRequest',
      'Authorization': `Bearer ${api_token}`
    },
    url:`/api/pacientes/${rfc}/estatura`,
    type:'POST',
    data:{estatura:nuevaEstatura}
  }).done(function(response){
    if (response["success"]==true){
    }
    else{
      console.log('No funciono')
    }
  });
}
$('#editarEstatura').click(function(){
  $(this).hide();
  $(this).siblings('#estatura_lab').hide();
  recuperarEstatura();
  $(this).siblings('#estatura').show();
  $(this).siblings('#aceptarEstatura').show();
})
$('#aceptarEstatura').click(function(){
  var nuevaEstatura=$('#estatura').val();
  $('#estatura_lab').html(`Talla: ${nuevaEstatura}`);
  $(this).hide();
  $(this).siblings('#estatura').hide();
  $(this).siblings('#estatura_lab').show();
  $(this).siblings('#editarEstatura').show();
  $('#estaturaValid').hide();
  actualizarEstatura(nuevaEstatura);
})
$('#estatura').keyup(function(){
  var estatura=$('#estatura').val();
  if(estatura>=1 && estatura<=255){
    $('#estaturaValid').show();
    $('#estaturaInvalid').hide();
    $('#aceptarEstatura').prop('disabled',false);
  }
  else{
    $('#estaturaValid').hide();
    $('#estaturaInvalid').show();
    $('#aceptarEstatura').prop('disabled',true);
  }
})
/*
Actualiaciones de actividades con validacion de front end
*/
function recuperarActividadFisica(){
  $.ajax({
    headers:{
      'Accept': 'application/json',
      'X-Requested-With': 'XMLHttpRequest',
      'Authorization': `Bearer ${api_token}`
    },
    url:`/api/pacientes/${rfc}/actividad_fisica`,
    type:'GET'
  }).done(function(response){
    if (response["success"]==true){
      $('#actividad_fisica').val(response["data"]);
    }
    else{
      console.log('No response')
    }
  });
}
function actualizarActividadFisica(nuevaActividad){
  $.ajax({
    headers:{
      'Accept': 'application/json',
      'X-Requested-With': 'XMLHttpRequest',
      'Authorization': `Bearer ${api_token}`
    },
    url:`/api/pacientes/${rfc}/actividad_fisica`,
    type:'POST',
    data:{actividad_fisica:nuevaActividad}
  }).done(function(response){
    if (response["success"]==true){
    }
    else{
      console.log('No funciono')
    }
  });
}
$('#editar_actividad_fisica').click(function(){
  $(this).hide();
  $(this).siblings('#actividad_fisica_lab').hide();
  recuperarActividadFisica();
  $(this).siblings('#actividad_fisica').show();
  $(this).siblings('#aceptar_actividad_fisica').show();
})
$('#aceptar_actividad_fisica').click(function(){
  var nuevaActividad=$('#actividad_fisica').val();
  $('#actividad_fisica_lab').html(`Actividad física: ${nuevaActividad}`);
  $(this).hide();
  $(this).siblings('#actividad_fisica').hide();
  $(this).siblings('#actividad_fisica_lab').show();
  $(this).siblings('#editar_actividad_fisica').show();
  $('#actividad_fisicaValid').hide();
  actualizarActividadFisica(nuevaActividad);
})
$('#actividad_fisica').keyup(function(){
  var actividad_fisica=$('#actividad_fisica').val();
  if(validarRegex(actividad_fisica,/^[a-zA-Z ,]+$/) || actividad_fisica.length==0){
    $('#actividad_fisicaValid').show();
    $('#actividad_fisicaInvalid').hide();
    $('#aceptar_actividad_fisica').prop('disabled',false);
  }
  else{
    $('#actividad_fisicaValid').hide();
    $('#actividad_fisicaInvalid').show();
    $('#aceptar_actividad_fisica').prop('disabled',true);
  }
})
/*
Actualizacion de alergias con validaciones de frontend
*/
function recuperarAlergias(){
  $.ajax({
    headers:{
      'Accept': 'application/json',
      'X-Requested-With': 'XMLHttpRequest',
      'Authorization': `Bearer ${api_token}`
    },
    url:`/api/pacientes/${rfc}/alergias`,
    type:'GET'
  }).done(function(response){
    if (response["success"]==true){
      $('#alergias').val(response["data"]);
    }
    else{
      console.log('No response')
    }
  });
}
function actualizarAlergias(nuevaAlergia){
  $.ajax({
    headers:{
      'Accept': 'application/json',
      'X-Requested-With': 'XMLHttpRequest',
      'Authorization': `Bearer ${api_token}`
    },
    url:`/api/pacientes/${rfc}/alergias`,
    type:'POST',
    data:{alergias:nuevaAlergia}
  }).done(function(response){
    if (response["success"]==true){
    }
    else{
      console.log('No funciono')
    }
  });
}
$('#editarAlergias').click(function(){
  $(this).hide();
  $(this).siblings('#alergias_lab').hide();
  recuperarAlergias();
  $(this).siblings('#alergias').show();
  $(this).siblings('#aceptarAlergias').show();
})
$('#aceptarAlergias').click(function(){
  var nuevaAlergia=$('#alergias').val();
  $('#alergias_lab').html(`Alergias: ${nuevaAlergia}`);
  $(this).hide();
  $(this).siblings('#alergias').hide();
  $(this).siblings('#alergias_lab').show();
  $(this).siblings('#editarAlergias').show();
  $('#alergiasValid').hide();
  actualizarAlergias(nuevaAlergia);
})
$('#alergias').keyup(function(){
  var alergias=$('#alergias').val();
  if(validarRegex(alergias,/^[a-zA-Z ,]+$/) || alergias.length==0){
    $('#alergiasValid').show();
    $('#alergiasInvalid').hide();
    $('#aceptarAlergias').prop('disabled',false);
  }
  else{
    $('#alergiasValid').hide();
    $('#alergiasInvalid').show();
    $('#aceptarAlergias').prop('disabled',true);
  }
})
/*
Actualizacion en tiempo real del imc del paciente
*/
function calcularIMC_peso(){
  var estatura=$('#estatura_lab').html().replace(/[^\d.-]/g, '');
  console.log('Estatura extraida');
  console.log(estatura);
  estatura=parseFloat(estatura);
  var imc=$('#peso').val()/Math.pow(estatura/100,2);
  if($('#estatura').val()>0){
    $('#imc').html(`IMC: ${imc.toFixed(2)}`);
  }
}
function calcularIMC_estatura(){
  var peso=$('#peso_old').html().replace(/[^\d.-]/g, '');
  console.log('peso extraida');
  console.log(peso);
  peso=parseFloat(peso);
  var imc=peso/Math.pow($('#estatura').val()/100,2);
  if($('#estatura').val()>0){
      $('#imc').html(`IMC: ${imc.toFixed(2)}`);
  }
}
$('#estatura').change(function(){
    calcularIMC_estatura();
});
$('#peso').change(function(){
    calcularIMC_peso();
});