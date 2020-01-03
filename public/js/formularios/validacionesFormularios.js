/* Validaciones de la nota medica*/
function validarMotivo(){
  var motivo=$('#motivo').val();
  if(validarRegex(motivo,/^[a-zA-Z ,]+$/) && validarLongitudMinima(motivo,8)){
    $('#motivoValid').show();
    $('#motivoInvalid').hide();
  }
  else{
    $('#motivoValid').hide();
    $('#motivoInvalid').show();
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
  validarMotivo();
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
    console.log(suma);
    $('#sumaPorcentajeValid').hide();
    $('#sumaPorcentajeInvalid').show();
    valido=false;
  }else{
    $('#sumaPorcentajeInvalid').hide();
    $('#sumaPorcentajeValid').show();
  }
  return valido;
}
/* Validaciones de caracteristicas del paciente */
function validarPorcentajeGrasa(){
  var grasa_porcentaje=$('#grasa_porcentaje').val();
  if(grasa_porcentaje>=0 && grasa_porcentaje<=100 && grasa_porcentaje.length>0){
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
  if(musculo_porcentaje>=0 && musculo_porcentaje<=100 && musculo_porcentaje.length>0){
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