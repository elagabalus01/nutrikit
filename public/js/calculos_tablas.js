$('#plan_cereales').change(function(){
  var valor=$(this).val();
  $('#plan_cereales_copia').html(valor);
  $("#energia_cereales").html(valor*70);
  $("#proteina_cereales").html(valor*2);
  $("#lipidos_cereales").html(valor*2);
  $("#hidratos_cereales").html(valor*15);

});
$('#plan_leguminosas').change(function(){
  var valor=$(this).val();
  $('#plan_leguminosas_copia').html($(this).val());
  $("#energia_leguminosas").html(valor*105);
  $("#proteina_leguminosas").html(valor*6);
  $("#lipidos_leguminosas").html(valor*1);
  $("#hidratos_leguminosas").html(valor*18);
});
$('#plan_verduras').change(function(){
  var valor=$(this).val();
  $('#plan_verduras_copia').html($(this).val())
  $("#energia_verduras").html(valor*25);
  $("#proteina_verduras").html(valor*2);
  $("#lipidos_verduras").html(valor*0);
  $("#hidratos_verduras").html(valor*4);
});
$('#plan_frutas').change(function(){
  var valor=$(this).val();
  $('#plan_frutas_copia').html($(this).val())
  $("#energia_frutas").html(valor*60);
  $("#proteina_frutas").html(valor*0);
  $("#lipidos_frutas").html(valor*0);
  $("#hidratos_frutas").html(valor*12);
});
$('#plan_carnes').change(function(){
  var valor=$(this).val();
  $('#plan_carnes_copia').html($(this).val())
  $("#energia_carnes").html(valor*75);
  $("#proteina_carnes").html(valor*7);
  $("#lipidos_carnes").html(valor*5);
  $("#hidratos_carnes").html(valor*0);
});
$('#plan_lacteos').change(function(){
  var valor=$(this).val();
  $('#plan_lacteos_copia').html($(this).val())
  $("#energia_lacteos").html(valor*145);
  $("#proteina_lacteos").html(valor*9);
  $("#lipidos_lacteos").html(valor*8);
  $("#hidratos_lacteos").html(valor*12);
});
$('#plan_grasas').change(function(){
  var valor=$(this).val();
  $('#plan_grasas_copia').html($(this).val())
  $("#energia_grasas").html(valor*45);
  $("#proteina_grasas").html(valor*0);
  $("#lipidos_grasas").html(valor*5);
  $("#hidratos_grasas").html(valor*0);
});
$('#plan_azucares').change(function(){
  var valor=$(this).val();
  $('#plan_azucares_copia').html($(this).val())
  $("#energia_azucares").html(valor*20);
  $("#proteina_azucares").html(valor*0);
  $("#lipidos_azucares").html(valor*0);
  $("#hidratos_azucares").html(valor*10);
});
$("#calculoCalorias").change(function(){
  var total=0;
  $("#calculoCalorias tr:not(:last-child) td:nth-child(3)").each(function () {
    var val = $(this).html();
    val = val.replace('-',0);
    total += parseInt(val);
  });
  $('#energia_suma').html(total);

  total=0;
  $("#calculoCalorias tr:not(:last-child) td:nth-child(4)").each(function () {
    var val = $(this).html();
    val = val.replace('-',0);
    total += parseInt(val);
  });
  $('#proteina_suma').html(total);

  total=0;
  $("#calculoCalorias tr:not(:last-child) td:nth-child(5)").each(function () {
    var val = $(this).html();
    val = val.replace('-',0);
    total += parseInt(val);
  });
  $('#lipidos_suma').html(total);

  total=0;
  $("#calculoCalorias tr:not(:last-child) td:nth-child(6)").each(function () {
    var val = $(this).html();
    val = val.replace('-',0);
    total += parseInt(val);
  });
  $('#hidratos_suma').html(total);

  var proteinas_porcentaje=$('#proteinas_porcentaje').val()/100;
  var hidratos_porcentaje=$('#hidratos_porcentaje').val()/100;
  var lipidos_porcentaje=$('#lipidos_porcentaje').val()/100;

  var calorias_totales=$('#energia_suma').html();
  $('#gramos_proteina').html((calorias_totales*proteinas_porcentaje/4).toFixed(2));
  $('#calorias_proteina').html((calorias_totales*proteinas_porcentaje).toFixed(2));

  $('#gramos_hidratos').html((calorias_totales*hidratos_porcentaje/4).toFixed(2));
  $('#calorias_hidratos').html((calorias_totales*hidratos_porcentaje).toFixed(2));

  $('#gramos_lipidos').html((calorias_totales*lipidos_porcentaje/9).toFixed(2));
  $('#calorias_lipidos').html((calorias_totales*lipidos_porcentaje).toFixed(2));

  total=0;
  $("#resumen tr:not(:last-child) td:nth-child(3)").each(function () {
    var val = $(this).html();
    val = val.replace('-',0);
    total += parseFloat(val);
  });
  $('#gramos_suma').html(total.toFixed(2));

  total=0;
  $("#resumen tr:not(:last-child) td:nth-child(4)").each(function () {
    var val = $(this).html();
    val = val.replace('-',0);
    total += parseFloat(val);
  });
  $('#calorias_suma').html(total.toFixed(2));
});

$('#resumen').change(function(){
  var proteinas_porcentaje=$('#proteinas_porcentaje').val()/100;
  var hidratos_porcentaje=$('#hidratos_porcentaje').val()/100;
  var lipidos_porcentaje=$('#lipidos_porcentaje').val()/100;

  var calorias_totales=$('#energia_suma').html();
  $('#gramos_proteina').html((calorias_totales*proteinas_porcentaje/4).toFixed(2));
  $('#calorias_proteina').html((calorias_totales*proteinas_porcentaje).toFixed(2));

  $('#gramos_hidratos').html((calorias_totales*hidratos_porcentaje/4).toFixed(2));
  $('#calorias_hidratos').html((calorias_totales*hidratos_porcentaje).toFixed(2));

  $('#gramos_lipidos').html((calorias_totales*lipidos_porcentaje/9).toFixed(2));
  $('#calorias_lipidos').html((calorias_totales*lipidos_porcentaje).toFixed(2));

  total=0;
  $("#resumen tr:not(:last-child) td:nth-child(3)").each(function () {
    var val = $(this).html();
    val = val.replace('-',0);
    total += parseFloat(val);
  });
  $('#gramos_suma').html(total.toFixed(2));

  total=0;
  $("#resumen tr:not(:last-child) td:nth-child(4)").each(function () {
    var val = $(this).html();
    val = val.replace('-',0);
    total += parseFloat(val);
  });
  $('#calorias_suma').html(total.toFixed(2));

  total=0;
  $("#resumen tr:not(:last-child) td:nth-child(2)").each(function () {
    var val = parseInt($(this).children('input').val());
    total += val;
  });
  $('#porcentaje_suma').html(`${total}%`);
});