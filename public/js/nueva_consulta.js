function crearConsulta(){
    $.ajax({
      headers:{
        'Accept': 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
        'Authorization': `Bearer ${api_token}`
    },
    url:'api/consulta',
    type:'POST',
    data:{
        rfc:$('#rfc').val(),
        nombre:$('#fechaHora').val().replace('T',' '),
        estatura:,
        peso:,
        fecha_nacimiento:,
        sexo:,
        alergias:,
        observaciones:,
        descripcion_dieta:,
        actividad_fisica:,
        dieta_cereales:,
        dieta_leguminosas:,
        dieta_verduras:,
        dieta_frutas:,
        dieta_carnes:,
        dieta_lacteos:,
        dieta_grasas:,
        dieta_azucares:,
        plan_cereales:,
        plan_leguminosas:,
        plan_verduras:,
        plan_frutas:,
        plan_carnes:,
        plan_lacteos:,
        plan_grasas:,
        plan_azucares:,
        correo_electronico:,
        telefono:,
        grasas_porcentaje:,
        musculo_porcentaje:,
        hueso_kilos:,
        agua_litros:,

    }
    }).done(function(response){
        if (response["success"]==false){
            $('#errorMessage').empty();
            $('#errorMessage').append(response['message']);
            $('#errorGenerico').modal();
        }
        else{
            $('#successMessage').empty();
            $('#successMessage').append('La cita fue programada correctamente');
            $('#successGenerico').modal();
            $('#searchRfc').val('');
        }
    });
}
