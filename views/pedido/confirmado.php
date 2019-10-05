<?php if(isset($_SESSION['identity'])): ?>
<div class="col-10">
<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>
	<h1 class="text-center my-4">Tu pedido se ha confirmado</h1>
	<div class="alert alert-success" role="alert">
    <strong>La atencion ha sido guardada con exito</strong>
</div>
	
	<?php if (isset($pedido)): ?>
		<h3 class="mt-4">Datos de la atencion:</h3>

		Número de pedido: <?= $pedido->id ?>   <br/>
		Total a pagar: $<?= $pedido->precio ?> <br/>
		
		
		<h4 class="mt-4">Paciente:</h4>

		<table class="table table-bordered">
        <thead>
			<tr>
				<th>Imagen</th>
				<th>Nombre</th>
			</tr>
        </thead>
		<tbody>
			<?php while ($paciente = $pacientes->fetch_object()): ?>
				<tr>
					<td>
						<?php if ($paciente->imagen != null): ?>
							<img src="<?= base_url ?>uploads/images/<?= $paciente->imagen ?>" class="img_carrito" width="10%"/>
						<?php else: ?>
							<img src="<?= base_url ?>assets/img/doctora.png" class="img_carrito" width="10%"/>
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

<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete'): ?>
	<h1>Tu pedido NO ha podido procesarse</h1>
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
