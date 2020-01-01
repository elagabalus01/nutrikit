/* Validar formulario de inicio de sesion */
$("#email,#password").keyup(function(){
  var validaCorreo=validarCorreo();
  var validaContraseña=validarContraseña();
  if(validaCorreo && validaContraseña){
    $("#login").attr("disabled", false);
  }
  else{
    $("#login").attr("disabled", true);
  }
});