<?php if (isset($_SESSION['identity'])) : ?>
	<div class="col-10">

		<div class="row">
			<div class="col-12">

				<?php if (isset($edit) && isset($obra) && is_object($obra)) : ?>
					<h1 class="text-center my-4">Editar obra social <?= $obra->nombre ?></h1>
					<?php $url_action = base_url . "obrasociales/save&id=" . $obra->id_obrasociales; ?>

				<?php else : ?>
					<h1 class="text-center my-4">Nueva Obra Social</h1>
					<?php $url_action = base_url . "obrasociales/save"; ?>
				<?php endif; ?>
			</div>

			<div class="offset-1 col-8">

				<form action="<?= $url_action ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="nombre">Nombre :</label>
						<input type="text" class="form-control" name="nombre" value="<?= isset($obra) && is_object($obra) ? $obra->nombre : ''; ?>" />
					</div>
					<div class="form-group">
						<label for="dni">Cuit :</label>
						<input type="text" class="form-control" name="cuit" value="<?= isset($obra) && is_object($obra) ? $obra->cuit : ''; ?>" />

					</div>
					<div class="form-group">
						<label for="email">Correo :</label>
						<input type="email" class="form-control" name="correo" value="<?= isset($obra) && is_object($obra) ? $obra->correo : ''; ?>">

					</div>
					<div class="form-group">
						<label for="telefono">Telefono :</label>
						<input type="number" class="form-control" name="telefono" value="<?= isset($obra) && is_object($obra) ? $obra->telefono : ''; ?>">

					</div>

					<div class="form-group">
						<label for="direccion">Direccion :</label>
						<input type="text" class="form-control" name="direccion" value="<?= isset($direccion) && is_object($direccion) ? $obra->direccion : ''; ?>" />

					</div>

					<div class="form-group">
						<label for="provincia">Provincia :</label>
						<?php $provincias = Utils::showProvincias(); ?>
						<select class="form-control" name="provincia">
							<?php while ($provincia = $provincias->fetch_object()) : ?>
								<option value="<?= $provincia->id_provincia ?>">
									<?= $provincia->nombre ?>
								</option>
							<?php endwhile; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="direccion">Descuento % :</label>
						<input type="number" class="form-control" name="descuento" value="<?= isset($descuento) && is_object($descuento) ? $obra->descuento : ''; ?>" />

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