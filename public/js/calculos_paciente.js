function calcularIMC(){
    var imc=$('#peso').val()/Math.pow($('#estatura').val()/100,2);
    if($('#estatura').val()>0){
        $('#imc').html(`IMC: ${imc.toFixed(2)}`);
    }
}
$('#estatura,#peso').change(function(){
    calcularIMC();
});
$('#fecha_nacimiento').change(function(){
    var fecha_nacimiento=$(this).val();
    var hoy = new Date();
    fecha_nacimiento=new Date(fecha_nacimiento);
    var edad = hoy.getFullYear() - fecha_nacimiento.getFullYear();
    var mes_diff = hoy.getMonth() - fecha_nacimiento.getMonth();
    if (mes_diff < 0 || (mes_diff === 0 && hoy.getDate() <= fecha_nacimiento.getDate())) {
        edad--;
    }
    $('#edad').html(`Edad: ${edad}`);
});