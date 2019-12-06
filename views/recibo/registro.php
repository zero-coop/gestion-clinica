<div class="col-10">
<div class="row">

<div class="col-12 my-5"> <h4 class="text-center display-4">Registro de pagos</h4></div>
    
<table class="table my-3">
  <thead>
    <tr>
      <th>N° Recibo</th>
      <th>N° Orden</th>
      <th>Paciente</th>
      <th>Medico</th>
      <th>Descripcion</th>
      <th>Pago</th>
      <th>Total</th>
      <th>Fecha</th>
    </tr>
<?php while ($mos = $mostrar->fetch_object()) : ?>
<tr>
<th scope="row"><?=$mos->recibo?></th>
    <td><?=$mos->id_orden_atencion?></td>
    <td><?=$mos->pacienteapellido . " " . $mos->pacientenombre?></td>
    <td><?=$mos->medicoapellido . " " . $mos->mediconombre?></td>
    <td><?=$mos->descripcion?></td>
    <td><?=$mos->metodo?></td>
    <td><?=$mos->monto?></td>
    <td><?=$mos->fecha?></td>
</tr>
<?php endwhile;?>
  </thead>
  <tbody>

  </tbody>
</table>


</div>

</div>