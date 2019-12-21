function validarLongitudMinima(input,longitud){
    if(input.length>=longitud){
        return true;
    }
    else{
        return false;
    }
}
function validarLongitudRango(input,min,max){
    if(input.length>=min && input.length<=max){
        return true;
    }
    else{
        return false;
    }
}
function validarRegex(input,reguex){
    if(input.match(reguex)){
        return true;
    }
    else{
        return false;
    }
}