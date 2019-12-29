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
        $("#crearCita").attr("disabled", false);
    },
    minLength: 2,
});
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
$('#crearCita').on('click',function(){
    crearCita();
});

$("#searchRfc").change(function(){
  var rfc=$('#searchRfc').val();
  if(validarRegex(rfc,/^[a-zA-Z]{4}[0-9]{6}[a-zA-Z0-9]{3}$/) && validarLongitudMinima(rfc,13)){
      $("#crearCita").attr("disabled", false);
  }
  else{
      $("#crearCita").attr("disabled", true);
  }
});