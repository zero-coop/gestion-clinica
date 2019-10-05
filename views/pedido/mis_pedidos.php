<?php if(isset($_SESSION['identity'])): ?>
<div class="col-10">
<?php if (isset($gestion)): ?>
	<h1 class="text-center my-4">Gestionar atenciones</h1>
<?php else: ?>
	<h1 class="text-center my-4">Atenciones</h1>
<?php endif; ?>
<table class="table table-bordered">
  <thead>
	<tr>
		<th>Nº Atencion</th>
		<th>Precio</th>
		<th>Fecha</th>
		<th>Estado</th>
	</tr>
  </thead>
  <tbody>
	<?php
	while ($ped = $pedidos->fetch_object()):
		?>

		<tr>
			<td scope="row">
				<a href="<?= base_url ?>pedido/detalle&id=<?= $ped->id ?>"><?= $ped->id ?></a>
			</td>
			<td>
				<?= $ped->precio ?> $
			</td>
			<td>
				<?= $ped->fecha ?>
			</td>
			<td>
				<?=Utils::showStatus($ped->estado)?>
			</td>
		</tr>

	<?php endwhile; ?>
		</tbody>
</table>
</div>
</div>
</div>
<?php else: ?>
<div class="col-10">
	
	<div class="alert alert-warning m-5" role="alert">
		<strong>Necesitas ser andministrador.</strong> Inicia sesion aqui <a href="<?=base_url?>"></a>
	</div>
</div>


<?php endif; ?>