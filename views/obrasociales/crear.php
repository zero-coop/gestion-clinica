<?php if (isset($_SESSION['identity'])) : ?>
	<div class="col-10">

		<div class="row">
			<div class="col-12">

				<?php if (isset($edit) && isset($pac) && is_object($pac)) : ?>
					<h1 class="text-center my-4">Editar paciente <?= $pac->nombreyApellido ?></h1>
					<?php $url_action = base_url . "paciente/save&id=" . $pac->id; ?>

				<?php else : ?>
					<h1 class="text-center my-4">Nuevo paciente</h1>
					<?php $url_action = base_url . "paciente/save"; ?>
				<?php endif; ?>
			</div>

			<div class="offset-1 col-8">

				<form action="<?= $url_action ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="nombre">Nombre :</label>
						<input type="text" class="form-control" name="nombre" value="<?= isset($pac) && is_object($pac) ? $pac->nombreyApellido : ''; ?>" />
					</div>
					<div class="form-group">
						<label for="dni">Cuit :</label>
						<input type="text" class="form-control" name="dni" value="<?= isset($pac) && is_object($pac) ? $pac->sexo : ''; ?>" />

					</div>
					<div class="form-group">
						<label for="email">Correo :</label>
						<input type="email" class="form-control" name="correo">

					</div>
					</div>
					<div class="form-group">
						<label for="telefono">Telefono :</label>
						<input type="number" class="form-control" name="telefono">

					</div>

					<div class="form-group">
						<label for="direccion">Direccion :</label>
						<input type="text" class="form-control" name="direccion" value="<?= isset($pac) && is_object($pac) ? $pac->direccion : ''; ?>" />

					</div>

					<div class="form-group">
						<label for="provincia">Provincia :</label>
						<?php $provincias = Utils::showProvincias(); ?>
						<select class="form-control" name="provincia">
							<?php while ($provincia = $provincias->fetch_object()) : ?>
								<option value="<?= $provincia->id_provincia ?>" <?= isset($pac) && is_object($pac) && $doc->id == $pac->doctor_id ? 'selected' : ''; ?>>
									<?= $provincia->nombre ?>
								</option>
							<?php endwhile; ?>
						</select>
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
			<strong>Necesitas ser andministrador.</strong> Inicia sesion aqui <a href="<?= base_url ?>"></a>
		</div>
	</div>


<?php endif; ?>