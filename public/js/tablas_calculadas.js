var valor=$('#plan_cereales').html();
$("#energia_cereales").html(valor*70);
$("#proteina_cereales").html(valor*2);
$("#lipidos_cereales").html(valor*2);
$("#hidratos_cereales").html(valor*15);

valor=$('#plan_leguminosas').html();
$("#energia_leguminosas").html(valor*105);
$("#proteina_leguminosas").html(valor*6);
$("#lipidos_leguminosas").html(valor*1);
$("#hidratos_leguminosas").html(valor*18);

valor=$('#plan_verduras').html();
$("#energia_verduras").html(valor*25);
$("#proteina_verduras").html(valor*2);
$("#lipidos_verduras").html(valor*0);
$("#hidratos_verduras").html(valor*4);

valor=$('#plan_frutas').html();
$("#energia_frutas").html(valor*60);
$("#proteina_frutas").html(valor*0);
$("#lipidos_frutas").html(valor*0);
$("#hidratos_frutas").html(valor*12);

valor=$('#plan_carnes').html();
$("#energia_carnes").html(valor*75);
$("#proteina_carnes").html(valor*7);
$("#lipidos_carnes").html(valor*5);
$("#hidratos_carnes").html(valor*0);

valor=$('#plan_lacteos').html();
$("#energia_lacteos").html(valor*145);
$("#proteina_lacteos").html(valor*9);
$("#lipidos_lacteos").html(valor*8);
$("#hidratos_lacteos").html(valor*12);

valor=$('#plan_grasas').html();
$("#energia_grasas").html(valor*45);
$("#proteina_grasas").html(valor*0);
$("#lipidos_grasas").html(valor*5);
$("#hidratos_grasas").html(valor*0);

valor=$('#plan_azucares').html();
$("#energia_azucares").html(valor*20);
$("#proteina_azucares").html(valor*0);
$("#lipidos_azucares").html(valor*0);
$("#hidratos_azucares").html(valor*10);

var total=0;
$("#calculoCalorias tr:not(:last-child) td:nth-child(3)").each(function (){
  var val = $(this).html();
  val = val.replace('-',0);
  total += parseInt(val);
});
$('#energia_suma').html(total);

total=0;
$("#calculoCalorias tr:not(:last-child) td:nth-child(4)").each(function (){
  var val = $(this).html();
  val = val.replace('-',0);
  total += parseInt(val);
});
$('#proteina_suma').html(total);

total=0;
$("#calculoCalorias tr:not(:last-child) td:nth-child(5)").each(function (){
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

var calorias_totales=$('#energia_suma').html();
$('#gramos_proteina').html((calorias_totales*0.15/4).toFixed(2));
$('#calorias_proteina').html((calorias_totales*0.15).toFixed(2));

$('#gramos_hidratos').html((calorias_totales*0.6/4).toFixed(2));
$('#calorias_hidratos').html((calorias_totales*0.6).toFixed(2));

$('#gramos_lipidos').html((calorias_totales*0.25/9).toFixed(2));
$('#calorias_lipidos').html((calorias_totales*0.25).toFixed(2));

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