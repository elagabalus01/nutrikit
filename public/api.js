console.log("Aqui se va a usar la api");
function cancelarCita(id){
    console.log("Se borra la cita con el id ");
    console.log(id);
}
$('#cancelarCita').on('click',function (argument) {
    cancelarCita(0);
});