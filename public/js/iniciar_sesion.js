$("#email,#password").keyup(function(){
  var correo=$('#email').val();
  var contraseña=$('#password').val();
  var validaCorreo=false;
  var validaContraseña=false;
  if(validarRegex(correo,/^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü0-9-_.@]+$/) && validarLongitudMinima(correo,5)){
    validaCorreo=true;
    console.log('This should be working');
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
  if(validaCorreo && validaContraseña){
    $("#login").attr("disabled", false);
  }
  else{
      $("#login").attr("disabled", true);
  }
});