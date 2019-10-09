<?php if (isset($_SESSION['identity'])) : ?>
	<div class="col-10">

		<div class="row">
			<div class="col-12">

				<?php if (isset($edit) && isset($doc) && is_object($doc)) : ?>
					<h1 class="text-center my-4">Editar Doctor <?= $doc->apellido ?></h1>
					<?php $url_action = base_url . "doctor/save&id=" . $doc->id; ?>

				<?php else : ?>
					<h1 class="text-center my-4">Nuevo Doctor</h1>
					<?php $url_action = base_url . "doctor/save"; ?>
				<?php endif; ?>
			</div>

			<div class="offset-1 col-8">

				<form action="<?= $url_action ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="apellido">Apellido:</label>
						<input type="text" class="form-control" name="apellido" value="<?= isset($doc) && is_object($doc) ? $doc->nombre : ''; ?>" />
					</div>
					<div class="form-group">
						<label for="nombre">Nombre:</label>
						<input type="text" class="form-control" name="nombre" value="<?= isset($doc) && is_object($doc) ? $doc->apellido : ''; ?>" />
					</div>
					<div class="form-group">
						<label for="dni">DNI:</label>
						<input type="text" class="form-control" name="dni" value="<?= isset($doc) && is_object($doc) ? $doc->dni : ''; ?>" />
					</div>
					<div class="form-group">
						<label for="dni">Especialidad:</label>
						<input type="text" class="form-control" name="especialidad" value="<?= isset($doc) && is_object($doc) ? $doc->especialidad : ''; ?>" />
					</div>
					<div class="form-group">
						<label for="dni">Matricula:</label>
						<input type="text" class="form-control" name="matricula" value="<?= isset($doc) && is_object($doc) ? $doc->matricula : ''; ?>" />
					</div>
					<div class="form-group">
						<label for="dni">Domicilio:</label>
						<input type="text" class="form-control" name="domicilio" value="<?= isset($doc) && is_object($doc) ? $doc->domicilio : ''; ?>" />
					</div>
					<div class="form-group">
						<label for="dni">Telefono:</label>
						<input type="text" class="form-control" name="telefono" value="<?= isset($doc) && is_object($doc) ? $doc->telefono : ''; ?>" />
					</div>
					<div class="form-group">
						<label for="dni">Celular:</label>
						<input type="text" class="form-control" name="celular" value="<?= isset($doc) && is_object($doc) ? $doc->celular : ''; ?>" />
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