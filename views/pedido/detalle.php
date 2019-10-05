<?php if(isset($_SESSION['identity'])): ?>
<div class="col-10">
<h1 class="text-center my-4">Detalle de la atencion</h1>

<?php if (isset($pedido)): ?>
		<?php if(isset($_SESSION['admin'])): ?>
			<h3>Cambiar estado</h3>
			<form action="<?=base_url?>pedido/estado" method="POST">

			<div class="form-group">
				<input type="hidden" value="<?=$pedido->id?>" name="pedido_id"/>
			</div>
			<div class="form-group">
				<select name="estado">
					<option value="confirm" <?=$pedido->estado == "confirm" ? 'selected' : '';?>>Pendiente</option>
					<option value="preparation" <?=$pedido->estado == "preparation" ? 'selected' : '';?>>Atendiendo</option>
					<option value="ready" <?=$pedido->estado == "ready" ? 'selected' : '';?>>Terminado</option>
				</select>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-info" value="Cambiar estado">Cambiar estado</button>
			</div>
			</form>
			<br/>
		<?php endif; ?>

		<h3>Detalles</h3>
		Obra social: <?= $pedido->obra_social ?>   <br/>
		Estado: <?=Utils::showStatus($pedido->estado)?> <br/>
		Número de atencion: <?= $pedido->id ?>   <br/>
		Total a pagar: $<?= $pedido->precio ?>  <br/>
		Pacientes:

		<table class="table table-bordered mt-4">
		<thead>
			<tr>
				<th>Imagen</th>
				<th>Nombre</th>

			</tr>
		</thead>
			<?php while ($paciente = $pacientes->fetch_object()): ?>
		<tbody>
				<tr>
					<td>
						<?php if ($paciente->imagen != null): ?>
							<img src="<?= base_url ?>uploads/images/<?= $paciente->imagen ?>" class="img_carrito" width="100px"/>
						<?php else: ?>
							<img src="<?= base_url ?>assets/img/doctora.png" class="img_carrito" width="100px"/>
						<?php endif; ?>
					</td>
					<td>
						<a href="<?= base_url ?>paciente/ver&id=<?= $paciente->id ?>"><?= $paciente->nombreyApellido ?></a>
					</td>
				</tr>
			<?php endwhile; ?>
		</tbody>
		</table>

	<?php endif; ?>
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