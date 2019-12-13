<?php if (isset($_SESSION['identity'])) : ?>
	<div class="col-10">

		<div class="row">
			<div class="col-12">
				<?php $med = $med->fetch_object(); ?>
				<?php if (isset($edit) && isset($med) && is_object($med)) : ?>
					<h1 class="text-center my-4">Editar Doctor <?= $med->apellido ?></h1>
					<?php $url_action = base_url . "medico/save&id=" . $med->id_medico; ?>

				<?php else : ?>
					<h1 class="text-center my-4">Nuevo Doctor</h1>
					<?php $url_action = base_url . "medico/save"; ?>
				<?php endif; ?>
			</div>

			<div class="offset-1 col-8">

				<form action="<?= $url_action ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="apellido">Apellido:</label>
						<input type="text" class="form-control" name="apellido" value="<?= isset($med) && is_object($med) ? $med->apellido : ''; ?>" />
					</div>
					<div class="form-group">
						<label for="nombre">Nombre:</label>
						<input type="text" class="form-control" name="nombre" value="<?= isset($med) && is_object($med) ? $med->nombre : ''; ?>" />
					</div>
					<div class="form-group">
						<label for="dni">DNI:</label>
						<input type="text" class="form-control" name="dni" value="<?= isset($med) && is_object($med) ? $med->dni : ''; ?>" />
					</div>
					<div class="form-group">
						<label for="dni">Especialidad:</label>
						<input type="text" class="form-control" name="especialidad" value="<?= isset($med) && is_object($med) ? $med->especialidad : ''; ?>" />
					</div>
					<div class="form-group">
						<label for="dni">Matricula:</label>
						<input type="text" class="form-control" name="matricula" value="<?= isset($med) && is_object($med) ? $med->matricula : ''; ?>" />
					</div>
					<div class="form-group">
						<label for="domicilio">Domicilio:</label>
						<input type="text" class="form-control" name="domicilio" value="<?= isset($med) && is_object($med) ? $med->domicilio : ''; ?>" />
					</div>
					<div class="form-group">
						<label for="telefono">Telefono:</label>
						<input type="number" class="form-control" name="telefono" value="<?= isset($med) && is_object($med) ? $med->telefono : ''; ?>" />
					</div>
					<div class="form-group">
						<label for="celular">Celular:</label>
						<input type="number" class="form-control" name="celular" value="<?= isset($med) && is_object($med) ? $med->celular : ''; ?>" />
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

<?php else : ?>
	<div class="col-10">

		<div class="alert alert-warning m-5" role="alert">
			<strong>Necesitas ser administrador.</strong> Inicia sesion aqui <a href="<?= base_url ?>"></a>
		</div>
	</div>


<?php endif; ?>