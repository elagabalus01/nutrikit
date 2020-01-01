<div class="row">
  <div class="col">
    <h1>Consulta</h1>
  </div>
</div>
<div class="row">
  <div class="col">
    <label>Motivo de la consulta</label>
    <br>
    <input style="width: 100%" maxlength="100" type="text" id="motivo">
    <div id="motivoValid" class="valid-feedback">Aceptado</div>
    <div id="motivoInvalid" class="invalid-feedback">El texto no es válido</div>
  </div>
</div>
<div class="row">
  <div class="col">
    <label>Dieta habitual</label>
    <br>
    <textarea rows="4" style="width:100%" id="descripcion_dieta"></textarea>
    <div id="descripcion_dietaValid" class="valid-feedback">Aceptado</div>
    <div id="descripcion_dietaInvalid" class="invalid-feedback">Sólo se aceptan hasta 1024 carácteres</div>
  </div>
</div>
<div class="row">
  <div class="col">
    <label>Observaciones</label>
    <br>
    <textarea rows="4" style="width:100%" id="observaciones"></textarea>
    <div id="observacionesValid" class="valid-feedback">Aceptado</div>
    <div id="observacionesInvalid" class="invalid-feedback">Sólo se aceptan hasta 1024 carácteres</div>
  </div>
</div>
<div class="row">
  <div class="col">
    @include('app.componentes.tablas_formularios.tablaHabitualPlan')
  </div>
</div>
<div class="row">
  <div class="col-md-7">
    @include('app.componentes.tablas_formularios.tablaCalculoCalorias')
  </div>
  <div class="col-md-5">
    @include('app.componentes.tablas_formularios.tabla_cal_res_final')
  </div>
</div>