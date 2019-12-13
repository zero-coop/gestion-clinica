<?php if (isset($_SESSION['identity'])) : ?>
	<div class="col-10">

		<div class="row">
			<div class="col-12">

				<?php if (isset($edit) && isset($obr) && is_object($obr)) : ?>
					<h1 class="text-center my-4">Editar obra social <?= $obr->nombre ?></h1>
					<?php $url_action = base_url . "obrasociales/save&id=" . $obr->id_obrasociales; ?>

				<?php else : ?>
					<h1 class="text-center my-4">Nueva Obra Social</h1>
					<?php $url_action = base_url . "obrasociales/save"; ?>
				<?php endif; ?>
			</div>

			<div class="offset-1 col-8">
				
					
				<form action="<?= $url_action ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="nombre">Nombre :</label>
						<input type="text" class="form-control" name="nombre" value="<?= isset($obr) && is_object($obr) ? $obr->nombre : ''; ?>" />
					</div>
					<div class="form-group">
						<label for="dni">Cuit :</label>
						<input type="text" class="form-control" name="cuit" value="<?= isset($obr) && is_object($obr) ? $obr->cuit : ''; ?>" />

					</div>
					<div class="form-group">
						<label for="email">Correo :</label>
						<input type="email" class="form-control" name="correo" value="<?= isset($obr) && is_object($obr) ? $obr->correo : ''; ?>">

					</div>
					<div class="form-group">
						<label for="telefono">Telefono :</label>
						<input type="number" class="form-control" name="telefono" value="<?= isset($obr) && is_object($obr) ? $obr->telefono : ''; ?>">
					</div>

					<div class="form-group">
						<label for="direccion">Direccion :</label>
						<input type="text" class="form-control" name="direccion" value="<?= isset($obr) && is_object($obr) ? $obr->direccion : ''; ?>" />
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
						<input type="number" class="form-control" name="descuento" value="<?= isset($obr) && is_object($obr) ? $obr->descuento : ''; ?>" />

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