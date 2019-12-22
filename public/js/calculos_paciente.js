function calcularIMC(){
    var imc=$('#peso').val()/Math.pow($('#estatura').val()/100,2);
    if($('#estatura').val()>0){
        $('#imc').html(`IMC: ${imc.toFixed(2)}`);
    }
}
$('#estatura,#peso').change(function(){
    calcularIMC();
});