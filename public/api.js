console.log("Aqui se va a usar la api");
function cancelarCita(id){
    $.ajax({
        headers:{
            'accept':'aplication/json',
            'X-Requested-With':'XMLHttpRequest',
            'Authorization':`Bearer ${api_token}`
        },
        url:`/api/cita/${id}`,
        type:'Delete'
    }).done(function(response){
        if(response['success']==false){
            console.log('Hubo un error');
        }
        else{
            location.reload();
        }
    });
}
$('.cancelar,.cita').on('click',function (argument) {
    cancelarCita(this.id);
});