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
      <td id="proteinas_porcentaje" data-porcentaje='{{ $consulta->proteinas_porcentaje }}'>{{ $consulta->proteinas_porcentaje }} %</td>
      <td id="gramos_proteina">-</td>
      <td id="calorias_proteina">-</td>
    </tr>
    <tr>
      <th>HdC</th>
      <td id="hidratos_porcentaje" data-porcentaje='{{ $consulta->hidratos_porcentaje }}'>{{ $consulta->hidratos_porcentaje }} %</td>
      <td id="gramos_hidratos">-</td>
      <td id="calorias_hidratos">-</td>
    </tr>
    <tr>
      <th>Lípidos</th>
      <td id="lipidos_porcentaje" data-porcentaje='{{ $consulta->lipidos_porcentaje }}'>{{ $consulta->lipidos_porcentaje }} %</td>
      <td id="gramos_lipidos">-</td>
      <td id="calorias_lipidos">-</td>
    </tr>
    <tr>
      <th>Total</th>
      <td>100%</td>
      <td id="gramos_suma">-</td>
      <td id="calorias_suma">-</td>
    </tr>
  </tbody>
</table>