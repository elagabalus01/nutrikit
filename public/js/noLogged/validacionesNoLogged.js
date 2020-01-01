/* Validar el nombre del médico */
function validarNombre(){
    var nombre=$('#nombre').val();
    if(validarRegex(nombre,/^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü ]+$/) && validarLongitudMinima(nombre,4)){
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
/* Validar el correo electronico */
function validarCorreo() {
    var correo=$('#email').val();
    if(validarRegex(correo,/^[a-zA-Z0-9-_.]+@[a-zA-Z0-9-_.]+\.[a-zA-Z0-9-_.]+$/) && validarLongitudMinima(correo,5)){
        $('#emailValid').show();
        $('#emailInvalid').hide();
        return true;
    }
    else{
        $('#emailValid').hide();
        $('#emailInvalid').show();
        return false;
    }
}
/* Validar la contraseña */
function validarContraseña() {
    var contraseña=$('#password').val();
    if(validarRegex(contraseña,/^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü0-9*?!@#$/(){}=,.;:]+$/) && validarLongitudMinima(contraseña,8)){
    $('#passwordValid').show();
    $('#passwordInvalid').hide();
    return true;
  }
  else{
    $('#passwordValid').hide();
    $('#passwordInvalid').show();
    return false;
  }
}