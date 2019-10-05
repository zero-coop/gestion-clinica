<?php if(isset($_SESSION['identity'])): ?>
<div class="col-10">

<?php if(isset($edit) && isset($doc) && is_object($doc)): ?>
	<h1 class="text-center my-4">Editar doctor: <?=$doc->nombreyApellido?></h1>
	<?php $url_action = base_url."doctor/save&id=".$doc->id; ?>
	
<?php else: ?>
	<h1 class="text-center my-4">Nuevo Doctor</h1>
	<?php $url_action = base_url."doctor/save"; ?>
<?php endif; ?>

<form action="<?=$url_action?>" method="POST">
<div class="form-group">
	<label>Nombre y Apellido :</label>
	<input class="form-control" type="text" value="<?=isset($doc) && is_object($doc) ? $doc->nombreyApellido  : ''; ?>" name="nombre" required/>
</div>
<div class="form-group">
	<label>Especialidad :</label>
	<input class="form-control" type="text" value="<?=isset($doc) && is_object($doc) ? $doc->especialidad  : ''; ?>" name="especialidad" required/>
</div>
<div class="form-group">
	<label>Telefono :</label>
	<input class="form-control" type="number" value="<?=isset($doc) && is_object($doc) ? $doc->telefono  : ''; ?>" name="telefono" required/>
</div>
<div class="form-group">
	<label>Direccion :</label>
	<input class="form-control" type="text" value="<?=isset($doc) && is_object($doc) ? $doc->direccion  : ''; ?>" name="direccion" required/>
</div>
<div class="form-group">
	<label>Ciudad :</label>
	<input class="form-control" type="text" value="<?=isset($doc) && is_object($doc) ? $doc->ciudad  : ''; ?>" name="ciudad" required/>
</div>
	
	<button class="btn btn-primary my-3" type="submit" value="Guardar">Guardar</button>
</form>
</div>
</div>
</div>

<?php else:?>
<div class="col-10">
	
	<div class="alert alert-warning m-5" role="alert">
		<strong>Necesitas ser andministrador.</strong> Inicia sesion aqui <a href="<?=base_url?>"></a>
	</div>
</div>

<?php endif;?>