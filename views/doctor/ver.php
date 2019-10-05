<?php if(isset($_SESSION['identity'])): ?>
<div class="col-10">
<div class="row">
<div class="col-12">

<?php if (isset($doctor)): ?>
	<h1 class="text-center my-4"><?= $doctor->nombreyApellido ?></h1>
	<?php if ($pacientes->num_rows == 0): ?>
		<p>No hay pacientes para mostrar</p>
	<?php else: ?>
</div>

		<?php while ($pacient = $pacientes->fetch_object()): ?>
<div class="col-3">
			
				<a href="<?= base_url ?>paciente/ver&id=<?= $pacient->id ?>">
					<?php if ($pacient->imagen != null): ?>
						<img src="<?= base_url ?>uploads/images/<?= $pacient->imagen ?>" width="40%"/>
					<?php else: ?>
						<img src="<?= base_url ?>assets/img/doctora.png" width="40%"/>
					<?php endif; ?>
</div>
<div class="col-9">
					<h2><?= $pacient->nombreyApellido ?></h2>
				</a>
				<a href="<?=base_url?>carrito/add&id=<?=$pacient->id?>" class="button">
				<button class="btn btn-primary">Terminado</button>
				</a>


</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php else: ?>
<h1>El doctor no esta registrado</h1>
<?php endif; ?>
</div>	

</div>
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