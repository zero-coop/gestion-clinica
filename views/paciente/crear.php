<?php if(isset($_SESSION['identity'])): ?>
<div class="col-10">

<div class="row">
<div class="col-12">

<?php if(isset($edit) && isset($pac) && is_object($pac)): ?>
	<h1 class="text-center my-4">Editar paciente <?=$pac->nombreyApellido?></h1>
	<?php $url_action = base_url."paciente/save&id=".$pac->id; ?>
	
<?php else: ?>
	<h1 class="text-center my-4">Nuevo paciente</h1>
	<?php $url_action = base_url."paciente/save"; ?>
<?php endif; ?>
</div>

<div class="offset-1 col-8">
	


	
	<form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
<div class="form-group">		
		<label for="nombre">Nombre y Apellido :</label>
		<input type="text" class="form-control" name="nombre" value="<?=isset($pac) && is_object($pac) ? $pac->nombreyApellido : ''; ?>"/>

</div>
<div class="form-group">
		<label for="descripcion">Descripción :</label>
		<textarea class="form-control" name="descripcion"><?=isset($pac) && is_object($pac) ? $pac->descripcion : ''; ?></textarea>

</div>
<div class="form-group">
		<label for="sexo">Sexo :</label>
		<input type="text" class="form-control" name="sexo" value="<?=isset($pac) && is_object($pac) ? $pac->sexo : ''; ?>"/>

</div>
<div class="form-group">
		<label for="telefono">Telefono :</label>
		<input type="number" class="form-control" name="telefono" value="<?=isset($pac) && is_object($pac) ? $pac->telefono : ''; ?>"/>

</div>
<div class="form-group">
		<label for="direccion">Direccion :</label>
		<input type="text" class="form-control" name="direccion" value="<?=isset($pac) && is_object($pac) ? $pac->direccion : ''; ?>"/>

</div>
<div class="form-group">
		<label for="ciudad">Ciudad :</label>
		<input type="text" class="form-control" name="ciudad" value="<?=isset($pac) && is_object($pac) ? $pac->ciudad : ''; ?>"/>

</div>
<div class="form-group">
		<label for="doctor">Doctor :</label>
		<?php $doctores = Utils::showDoctores(); ?>
		<select class="form-control" name="doctor">
			<?php while ($doc = $doctores->fetch_object()): ?>
				<option value="<?= $doc->id ?>" <?=isset($pac) && is_object($pac) && $doc->id == $pac->doctor_id ? 'selected' : ''; ?>>
					<?= $doc->nombreyApellido ?>
				</option>
			<?php endwhile; ?>
		</select>

</div>
<div class="form-group">		
		<label for="imagen">Imagen :</label>
		<?php if(isset($pac) && is_object($pac) && !empty($pac->imagen)): ?>
			<img src="<?=base_url?>uploads/images/<?=$pac->imagen?>" class="thumb"/> 
		<?php endif; ?>
		<input type="file" class="form-control" name="imagen" />

</div>
<div class="form-group">
<button type="submit" class="btn btn-primary mt-2" value="Guardar">Guardar</button>		
		</div>

	</form>

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