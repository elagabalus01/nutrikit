$("#nombre,#email,#password").keyup(function(){
  var nombre=$('#nombre').val();
  var correo=$('#email').val();
  var contraseña=$('#password').val();
  var validaNombre=false;
  var validaCorreo=false;
  var validaContraseña=false;
  if(validarRegex(nombre,/^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü ]+$/) && validarLongitudMinima(nombre,4)){
    validaNombre=true;
    $('#nombreValid').show();
    $('#nombreInvalid').hide();
  }
  else{
    $('#nombreValid').hide();
    $('#nombreInvalid').show();
  }
  if(validarRegex(correo,/^[a-zA-Z0-9-_.]+@[a-zA-Z0-9-_.]+\.[a-zA-Z0-9-_.]+$/) && validarLongitudMinima(correo,5)){
    validaCorreo=true;
    $('#emailValid').show();
    $('#emailInvalid').hide();
  }
  else{
    $('#emailValid').hide();
    $('#emailInvalid').show();
  }
  if(validarRegex(contraseña,/^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü0-9*?!@#$/(){}=,.;:]+$/) && validarLongitudMinima(contraseña,8)){
    validaContraseña=true;
    $('#passwordValid').show();
    $('#passwordInvalid').hide();
  }
  else{
    $('#passwordValid').hide();
    $('#passwordInvalid').show();
  }
  if(validaNombre && validaCorreo && validaContraseña){
    $("#registrar").attr("disabled", false);
  }
  else{
      $("#registrar").attr("disabled", true);
  }
});