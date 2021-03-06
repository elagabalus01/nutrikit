// Cacncelar cita
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
// Link para encontrar las consultas anteriores de un  paciente
function consultasAnteriores(id){
    window.open(`/pacientes/${id}`,'_blank','toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=100,width=1100,height=700');
}