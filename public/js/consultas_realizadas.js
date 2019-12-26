$('#fechaConsultas').on('keyup keypress change click',function(){
  console.log('Validadno');
  if(validarFechaConsultas()){
    $("#irFecha").attr("disabled", false);
  }
  else{
    $("#irFecha").attr("disabled", true);
  }
});
function validarFechaConsultas(){
  var fecha_consulta=new Date($('#fechaConsultas').val());
  var min_fecha=new Date($('#fechaConsultas').attr('min'));
  var max_fecha=new Date($('#fechaConsultas').attr('max'));

  if(fecha_consulta>min_fecha && fecha_consulta<=max_fecha){
    $('#fechaConsultasValid').show();
    $('#fechaConsultasInvalid').hide();
    return true;
  }
  else{
    $('#fechaConsultasValid').hide();
    $('#fechaConsultasInvalid').show();
    return false;
  }
}
$('#irFecha').click(function(){
  var fecha=$('#fechaConsultas').val().split('-').join('');
  window.location.href=`/consultas/${fecha}`;
});
function validarRFC(){
  var rfc=$('#searchRfc').val();
  if(validarRegex(rfc,/^[a-zA-Z]{4}[0-9]{6}[a-zA-Z0-9]{3}$/) || validarLongitudMinima(rfc,13)){
    $("#ver").attr("disabled", false);
  }
  else{
    $("#ver").attr("disabled", true);
  }
}
$("#searchRfc").on('input propertychange paste autocompleteselect keyup keydown keypress change click focus',function(){
  validarRFC();
});
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
      },
    });
  },
  select: function(event, ui) {
    $("#ver").attr("disabled", false);
  },
  minLength: 2,
});
function checkRegisterRfc(rfc){
  $.ajax({
    headers:{
      'Accept': 'application/json',
      'X-Requested-With': 'XMLHttpRequest',
      'Authorization': `Bearer ${api_token}`
    },
    url:`/api/paciente/check/${rfc}`,
    type:'POST'
  }).done(function(response){
    if (response["success"]==false){
            //Si hubo un error
            console.log(response['message']);
            $('#errorMessage').empty();
            $('#errorMessage').append(response['message']);
            $('#errorGenerico').modal();
          }
          else{
            window.open(`/pacientes/${rfc}`,'_blank','toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=100,width=1100,height=700');
          }
        });
}
$("#ver").click(function(){
  var rfc=$('#searchRfc').val();
  checkRegisterRfc(rfc);
});