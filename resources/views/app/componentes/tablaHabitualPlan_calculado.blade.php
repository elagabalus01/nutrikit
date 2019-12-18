<table class="table table-responsive">
  <thead>
    <tr>
      <th>Alimento</th>
      <th>Dieta habitual</th>
      <th>Plan de alimentación</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>Verduras</th>
      <td>{{$consulta->dietaHabitual->verduras}}</td>
      <td>CalculoDeTabla</td>
    </tr>
    <tr>
      <th>Frutas</th>
      <td>{{$consulta->dietaHabitual->frutas}}</td>
      <td>CalculoDeTabla</td>
    </tr>
    <tr>
      <th>AOA</th>
      <td>{{$consulta->dietaHabitual->aoa}}</td>
      <td>CalculoDeTabla</td>
    </tr>
    <tr>
      <th>Cerales</th>
      <td>{{$consulta->dietaHabitual->cereales}}</td>
      <td>CalculoDeTabla</td>
    </tr>
  </tbody>
</table>