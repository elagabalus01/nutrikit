/* Validar el formulario de registro */
$("#nombre,#email,#password").keyup(function(){
  var validaNombre=validarNombre();
  var validaCorreo=validarCorreo();
  var validaContraseña=validarContraseña();
  if(validaNombre && validaCorreo && validaContraseña){
    $("#registrar").attr("disabled", false);
  }
  else{
    $("#registrar").attr("disabled", true);
  }
});