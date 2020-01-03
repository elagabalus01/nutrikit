/* Se realiza una consulta a la base de datos para 
    encontrar registros con el nombre o RFC parecido 
    al termino escrito en la entrada de texto
*/
$("#searchRfc").autocomplete({
    source: function(request, response){
        $.ajax({url: '/api/autocomplete',
            type:"post",
            data: {
                term : request.term,
            },
            dataType: "json",
            success: function(data){
                response(data);
            }
        });
    },
    select: function(event, ui) {
        if(validarFecha()){
            $("#crearCita").attr("disabled", false);
        }
    },
    minLength: 2,
});
/* Se crea una cita */
function crearCita(){
    $.ajax({
      headers:{
        'Accept': 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
        'Authorization': `Bearer ${api_token}`
    },
    url:'api/cita',
    type:'POST',
    data:{paciente_id:$('#searchRfc').val(),fecha_hora:$('#fechaHora').val().replace('T',' ')}
    }).done(function(response){
        if (response["success"]==false){
            //Si hubo un error
            $('#errorMessage').empty();
            $('#errorMessage').append(response['message']);
            $('#errorGenerico').modal();
        }
        else{
            //Si no hubo errores
            $('#successMessage').empty();
            $('#successMessage').append('La cita fue programada correctamente');
            $('#successGenerico').modal();
            $('#searchRfc').val('');
        }
    });
}
// Actualizar cuando cambia el valor
$('#fechaHora').change(function(){
    if(validarFecha()){
        $('#fechaValid').show();
        $('#fechaInvalid').hide();
        $("#crearCita").attr("disabled", false);
    }
    else{
        $('#fechaValid').hide();
        $('#fechaInvalid').show();
        $("#crearCita").attr("disabled", true);
    }
});
/* Se valida la fecha de la cita*/
function validarFecha(){
  var fecha=new Date($('#fechaHora').val());
  var min_fecha=new Date($('#fechaHora').attr('min'));
  var max_fecha=new Date($('#fechaHora').attr('max'));
  if(fecha>=min_fecha && fecha<=max_fecha){
    return true;
  }
  else{
    return false;
  }
}
/* Se comprueba que el rfc introducido tenga la forma de un RFC */
$("#searchRfc").change(function(){
  var rfc=$('#searchRfc').val();
  if(validarRegex(rfc,/^[a-zA-Z]{4}[0-9]{6}[a-zA-Z0-9]{3}$/) && validarLongitudMinima(rfc,13)){
      $("#crearCita").attr("disabled", false);
  }
  else{
      $("#crearCita").attr("disabled", true);
  }
});
/* Se crea la nueva cita */
$('#crearCita').on('click',function(){
    crearCita();
});