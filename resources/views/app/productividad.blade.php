@extends('layouts.main')
@section('titulo')
    <title>NUTRIKIT|Productividad</title>
@endsection
@section('variables')
<script>var api_token = "{{ Auth::user()->api_token }}" </script>
@endsection
@section('content')
@if($errors->any())
    <div class="alert alert-danger" role="alert">
        {{$errors->first()}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
@endif
<div class="container">
  <div class="row">
    <div class="col">
      <h1>Productividad</h1>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <label>Selecciona el tipo de reporte:</label>
      <select id="tipoReporteMenu">
          <option value="dia">Día</option>
          <option value="mes">Mes</option>
          <option value="año">Año</option>
      </select>
    </div>
  </div>
  <section id="tipoReporte">
    @include('app.componentes.opciones_reporte.dia')
  </section>
</div>
@include('app.componentes.mensajes.modalError')
@include('app.componentes.mensajes.modalSuccess')
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/validaciones.js') }}"></script>
<script type="text/javascript">
  function vistaDia() {
    $.ajax({
      url:`/reporte/dia`,
      type:'GET'
    }).done(function(response){
      $('#tipoReporte').html(response);
    });
  }
  function vistaMes() {
    $.ajax({
      url:`/reporte/mes`,
      type:'GET'
    }).done(function(response){
      $('#tipoReporte').html(response);
    });
  }
  function vistaAño() {
    $.ajax({
      url:`/reporte/año`,
      type:'GET'
    }).done(function(response){
      $('#tipoReporte').html(response);
    });
  }
  $('#tipoReporteMenu').change(function(){
    var seleccion=$(this).val();
    switch(seleccion){
      case 'dia':
        vistaDia();
      break;
      case 'mes':
        vistaMes();
      break;
      case 'año':
        vistaAño();
      break;
    }
  });
  function validarFecha(){
    var fecha_reporte=new Date($('#fechaReporte').val());
    var min_fecha=new Date($('#fechaReporte').attr('min'));
    var max_fecha=new Date($('#fechaReporte').attr('max'));

    if(fecha_reporte>min_fecha && fecha_reporte<=max_fecha){
      $('#fechaReporteValid').show();
      $('#fechaReporteInvalid').hide();
      $('#generar').prop('disabled', false);
    }
    else{
      $('#fechaReporteValid').hide();
      $('#fechaReporteInvalid').show();
      $('#generar').prop('disabled', true);
    }
  }
  $('#tipoReporte').on('change','#fechaReporte',function(){
    validarFecha();
  });
  $('#tipoReporte').on('click','#generar',function(){
    var seleccion=$('#tipoReporteMenu').val();
    switch(seleccion){
      case 'dia':
        var fecha=$('#fechaReporte').val().split('-').join('');
        descargarReporteDia(fecha);
      break;
      case 'mes':
        var mes=$('#mes').val();
        var año=$('#año').val();
        descargarReporteMes(mes,año);
      break;
      case 'año':
        var año=$('#año').val();
        descargarReporteAño(año);
      break;
    }
  });
  function descargarReporteDia(fecha) {
    var url=`/reporte/dia/${fecha}`;
    window.location = url;
  }
  function descargarReporteMes(mes,año) {
    var url=`/reporte/mes/${mes}/${año}`;
    window.location = url;
  }
  function descargarReporteAño(año) {
    var url=`/reporte/año/${año}`;
    window.location = url;
  }
</script>
@endsection
