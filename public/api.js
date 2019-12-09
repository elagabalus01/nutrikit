$("#mostrarAnimales").click(function(e)
{
    $.ajax(
        {
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'Authorization': `Bearer ${api_token}`
                // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            "url":'/api/animal',
            "type":"get",
            "dataType":"json"
        }
    ).done(function(data)
    {
        $("#listarAnimales").empty();
        if(data["data"].length>0)
        {
            $("#listarAnimales").append('<nav aria-label="Page navigation example" id="pageNav"></nav>');
            $("#pageNav").append('<ul class="pagination"></ul>');
            $(".pagination").append('<li class="page-item"><a class="page-link" href="#">Previous</a></li>');
            $(".pagination").append('<li class="page-item"><a class="page-link" href="#">1</a></li>');
            $(".pagination").append('<li class="page-item"><a class="page-link" href="#">2</a></li>');
            $(".pagination").append('<li class="page-item"><a class="page-link" href="#">3</a></li>');
            $(".pagination").append('<li class="page-item"><a class="page-link" href="#">Next</a></li>');
            $(".pagination").append("Monstrando animales ...");
            console.log(data["data"]);
            var nombre=null;
            for (var i=0;i<data["data"].length;i++)
            {
                nombre=data['data'][i]['nombre'];
                $("#listarAnimales").append(`<br>N°: ${i+1}`);
                $("#listarAnimales").append(`<br> nombre: ${nombre}`);
            }
        }
        else{
            $("#listarAnimales").empty();
            $("#listarAnimales").append("Aún no hay animales ... :c");
        }
    });
});
function guardarAnimal()
{
    var nombre=$("input[type=text][name=nombre]").val();
    var fecha=$("input[type=datetime-local][name=citaDate]").val();
    console.log(fecha);
    if (nombre.length>0){
        $('#inputNombre').val('');
        console.log(nombre);
        console.log("Ejecuntando proceso");
        $.ajax({
            headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'Authorization': `Bearer ${api_token}`
                },
            url:'/api/animal',
            type:"POST",
            data:{nombre:nombre}
        }).done(function(response){
            {
                if (response["success"]==false)
                {
                    console.log("Huvo un error");
                    $('#error').modal();
                }
                else{
                    console.log("Todo fue bien");
                    // location.reload();
                }
            };
        });
    }
}
function eliminarAnimal(id)
{
    $.ajax({
        headers: {
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            'Authorization': `Bearer ${api_token}`
        },
        url:`/api/animal/${id}`,
        type:"DELETE"
        }).done(function(response){
            {
                if (response["success"]==false)
                {
                    console.log("Huvo un error al eliminar");
                }
                else{
                    console.log("Eliminado correctamente");
                    var numRow=$('#displayTable tr').length;
                    if(numRow<4){
                        location=location.pathname;
                    }
                    else{
                        location.reload();
                    }
                }
            };
        });
}
$("#guardarAnimal").click(function(){
    guardarAnimal();
});
$(".eliminar").click(function(){
    console.log('eliminando');
    console.log(this.id);
    eliminarAnimal(this.id);
});
$(".editar").click(function(){
    var id=this.id;
    var data=$(`#${id}.nombre`);
    data.empty();
    data.append('<input id="actualizar" type="text" name="nombreActualizado">');
    $("#actualizar").keypress(function(e){
        if(e.which == 13){
            console.log('It works');
            actualizarAnimal(id);
        }
    });
});
function actualizarAnimal(id)
{
    var nombre=$("input[type=text][name=nombreActualizado]").val();
    if (nombre.length>0){
        $('#actualizar').val('');
        console.log(nombre);
        console.log("Ejecuntando proceso");
        $.ajax({
            headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'Authorization': `Bearer ${api_token}`
                },
            url:`/api/animal/${id}`,
            type:"PUT",
            data:{nombre:nombre}
        }).done(function(response){
            {
                if (response["success"]==false)
                {
                    console.log("Huvo un error");
                    $('#error').modal();
                }
                else{
                    console.log("Todo fue bien");
                    location=location.pathname;
                    location.reload();
                }
            };
        });
    }
    else{
        console.log("Error");
    }
}
function validarAlfaNumerico(input){
    var letterNumber = /^[a-zA-Z ]+$/;
    if(input.match(letterNumber)){
        return true;
    }
    else{
        return false;
    }
}
$('#inputNombre').keypress(function(e){
    if(e.which == 13){
        guardarAnimal();
    }
});
$("#inputNombre").keyup(function(){
    var nombre=$("input[type=text][name=nombre]").val();
    if(validarAlfaNumerico(nombre)){
        console.log("Pasa");
        $("#guardarAnimal").attr("disabled", false);
    }
    else{
        $("#guardarAnimal").attr("disabled", true);
        $('#inputNombre').unbind('keypress',function(e){
            e.stopPropagation();
        });
        console.log("No funciona");
    }
});