<div class="row justify-content-center">
    <div class="col-md-4">
        <h3>Generar el reporte del día</h3>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-4 align-self-end">
        <label>Fecha:</label>
        <input id="fechaReporte" min="{{ Carbon\Carbon::now()->subYears(10)->format('Y-m-d') }}" max="{{ Carbon\Carbon::now()->format('Y-m-d') }}" value="{{  Carbon\Carbon::now()->format('Y-m-d') }}" type="date">
        <button class="btn btn-primary" id="generar">Generar</button>
        <div id="fechaReporteValid" class="valid-feedback">Aceptado</div>
        <div id="fechaReporteInvalid" class="invalid-feedback">Fecha no valida</div>
    </div>
    
</div>