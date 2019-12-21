function validarLongitudMinima(input,longitud){
    if(input.length>longitud){
        return true;
    }
    else{
        return false;
    }
}
function validarAlfaNumerico(input){
    var letterNumber = /^[a-zA-Z0-9]+$/;
    if(input.match(letterNumber)){
        return true;
    }
    else{
        return false;
    }
}