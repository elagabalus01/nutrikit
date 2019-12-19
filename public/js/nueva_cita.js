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
            console.log("Huvo un error");
            console.log(response['message']);
            $('#errorMessage').empty();
            $('#errorMessage').append(response['message']);
            $('#errorGenerico').modal();
        }
        else{
            console.log("Todo correcto");
            $('#successMessage').empty();
            $('#successMessage').append('La cita fue programada correctamente');
            $('#successGenerico').modal();
            $('#searchRfc').val('');
        }
    });
}
$('#crearCita').on('click',function(){
    console.log($('#fechaHora').val().replace('T',' '));
    crearCita();
});