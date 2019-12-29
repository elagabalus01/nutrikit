<table id="resumen" class="table table-responsive">
  <thead>
    <th></th>
    <th>Porcentajes</th>
    <th>Gramos</th>
    <th>Calorías</th>
  </thead>
  <tbody>
    <tr>
      <th>Proteína</th>
      <td><input class="porcentajes_macros" min="0" max="100" type="number" id="proteinas_porcentaje" value="15"></td>
      <td id="gramos_proteina">-</td>
      <td id="calorias_proteina">-</td>
    </tr>
    <tr>
      <th>HdC</th>
      <td><input class="porcentajes_macros" min="0" max="100" type="number" id="hidratos_porcentaje" value="60"></td>
      <td id="gramos_hidratos">-</td>
      <td id="calorias_hidratos">-</td>
    </tr>
    <tr>
      <th>Lípidos</th>
      <td><input class="porcentajes_macros" min="0" max="100" type="number" id="lipidos_porcentaje" value="25"></td>
      <td id="gramos_lipidos">-</td>
      <td id="calorias_lipidos">-</td>
    </tr>
    <tr>
      <th>Total</th>
      <td id="porcentaje_suma">-</td>
      <td id="gramos_suma">-</td>
      <td id="calorias_suma">-</td>
    </tr>
  </tbody>
</table>
<div id="sumaPorcentajeValid" class="valid-feedback">Porcentajes aceptados</div>
<div id="sumaPorcentajeInvalid" class="invalid-feedback">La suma de los porcentajes debe ser 100%</div>