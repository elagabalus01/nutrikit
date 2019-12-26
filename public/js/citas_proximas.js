$('#fechaCitas').on('keyup keypress change click',function(){
  if(validarFechaConsultas()){
    $("#irFecha").attr("disabled", false);
  }
  else{
    $("#irFecha").attr("disabled", true);
  }
});
function validarFechaConsultas(){
  var fecha_consulta=new Date($('#fechaCitas').val());
  var min_fecha=new Date($('#fechaCitas').attr('min'));
  var max_fecha=new Date($('#fechaCitas').attr('max'));

  if(fecha_consulta>=min_fecha && fecha_consulta<=max_fecha){
    $('#fechaCitasValid').show();
    $('#fechaCitasInvalid').hide();
    return true;
  }
  else{
    $('#fechaCitasValid').hide();
    $('#fechaCitasInvalid').show();
    return false;
  }
}
$('#irFecha').click(function(){
  var fecha=$('#fechaCitas').val().split('-').join('');
  window.location.href=`/citas/${fecha}`;
});