<?php if (isset($_SESSION['identity'])) : ?>

	<div class="col-10">

		<div class="row">
			<div class="col-12">

				<?php if (isset($edit) && isset($ped) && is_object($ped)) : ?>
					<h1 class="text-center my-4">Editar Pedido <?= $ped->id_orden_atencion; ?></h1>
					<?php $url_action = base_url . "pedido/save&id=" . $ped->id_orden_atencion; ?>

				<?php else : ?>
					<h1 class="text-center my-4">Nuevo Pedido</h1>
					<?php $url_action = base_url . "pedido/save"; ?>
				<?php endif; ?>
			</div>

			<div class="offset-1 col-8">

				<form action="<?= $url_action ?>" method="POST" enctype="multipart/form-data">
					
					<div class="form-group">
						<label for="medico">Medico :</label>
						<?php $medicos = medico::getAllNombre(); ?>			
						<select class="form-control" name="medico">
							<?php while ($medico = $medicos->fetch_object()) : ?>
								<option value="<?= $medico->id_medico ?>" <?= isset($ped) && is_objet($ped) && $ped->id_medico == $medico->id_medico ? 'selected' : ''; ?>>
									<?= $medico->nombre .' '. $medico->apellido . ' | '. $medico->especialidad ?>
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