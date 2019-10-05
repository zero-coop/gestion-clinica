<?php if(isset($_SESSION['identity'])): ?>
<div class="col-10">
<div class="row">
	
<?php if (isset($pacient)): ?>

<div class="col-12">
	<h1 class="text-center my-4"><?= $pacient->nombreyApellido ?></h1>
</div>
	
	<div class="col-2">
	
			<?php if ($pacient->imagen != null): ?>
				<img src="<?= base_url ?>uploads/images/<?= $pacient->imagen ?>" width="40%" />
			<?php else: ?>
				<img src="<?= base_url ?>assets/img/doctora.png" width="40%" />
			<?php endif; ?>
	</div>
	<div class="col-10">
	
	
			<p class="description"><?= $pacient->descripcion ?></p>
			<a href="<?=base_url?>carrito/add&id=<?=$pacient->id?>" class="button">
			<button type="button" class="btn btn-primary">Terminado</button></a>
	</div>
	
	
<?php else: ?>
	<h1>El paciente no existe</h1>
<?php endif; ?>
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