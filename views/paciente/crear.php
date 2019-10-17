<?php if (isset($_SESSION['identity'])) : ?>
	<div class="col-10">

		<div class="row">
			<div class="col-12">

				<?php if (isset($edit) && isset($pac) && is_object($pac)) : ?>
					<h1 class="text-center my-4">Editar paciente <?= $pac->apellido . ", ". $pac->nombre ?></h1>
					<?php $url_action = base_url . "paciente/save&id=" . $pac->id_paciente; ?>

				<?php else : ?>
					<h1 class="text-center my-4">Nuevo paciente</h1>
					<?php $url_action = base_url . "paciente/save"; ?>
				<?php endif; ?>
			</div>

			<div class="offset-1 col-8">

				<form action="<?= $url_action ?>" method="POST" enctype="multipart/form-data">
					
					<div class="form-group">
						<label for="nombre">Nombres :</label>
						<input type="text" class="form-control" name="nombre" required value="<?= isset($pac) && is_object($pac) ? $pac->nombre : ''; ?>" />
					</div>
					<div class="form-group">
						<label for="apellido">Apellidos :</label>
						<input type="text" class="form-control" name="apellido" required value="<?= isset($pac) && is_object($pac) ? $pac->apellido : ''; ?>" />
					</div>

					<div class="form-group">
						<label for="dni">DNI :</label>
						<input type="text" class="form-control" name="dni" pattern="[0-9.,]+" maxlength="10" required value="<?= isset($pac) && is_object($pac) ? $pac->dni : ''; ?>" />
					</div>

					<div class="form-group">
						<label for="fecha">Fecha Nacimiento :</label>
						<input type="date" name="fecha_nacimiento" max="<?= date('Y-m-d'); ?>" required value="<?= isset($pac) && is_object($pac) ? $pac->fecha_nacimiento : ''; ?>">

					</div>
					<div class="form-group">
						<label for="sexo">Sexo :</label>
						<br>
						<input type="radio" name="sexo" required value="Masculino" <?= isset($pac) && is_object($pac) && $pac->sexo == "Masculino" ? 'checked' : ''; ?>> Masculino<br>
						<input type="radio" name="sexo" required value="Femenino" <?= isset($pac) && is_object($pac) && $pac->sexo == "Femenino" ? 'checked' : ''; ?>> Femenino<br>

					</div>

					<div class="form-group">
						<label for="grupo_sanguineo">Grupo Sanguíneo :</label>
						<?php $grupos = Utils::showGrupos(); ?>
						<select class="form-control" name="grupo_sanguineo">
							<?php while ($grupo = $grupos->fetch_object()) : ?>
								<option value="<?= $grupo->id_grupo ?>" <?= isset($pac) && is_object($pac) && $pac->grupo_sanguineo == $grupo->id_grupo ? 'selected' : ''; ?>>
									<?= $grupo->nombre ?>
								</option>
							<?php endwhile; ?>
						</select>
					</div>

					<div class="form-group">
						<label for="telefono">Telefono :</label>
						<input type="number" class="form-control" name="telefono" required value="<?= isset($pac) && is_object($pac) ? $pac->telefono : ''; ?>" />

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
								<option value="<?= $provincia->id_provincia ?>" <?= isset($pac) && is_object($pac) && $pac->provincia == $provincia->id_provincia ? 'selected' : ''; ?>>
									<?= $provincia->nombre ?>
								</option>
							<?php endwhile; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="doctor">Obra Social :</label>
						<?php $obras = Utils::showObras(); ?>
						<?php
							if(isset($pac) && is_object($pac)){
								$one_obra = Utils::getObra($pac->id_paciente);
							}
						?>
						<select class="form-control" name="obrasocial">
							<?php while ($obra = $obras->fetch_object()) : ?>
								<option value="<?= $obra->id_obrasociales ?>" <?= isset($pac) && is_object($pac) && $obra->id_obrasociales == $one_obra->id_obrasociales ? 'selected' : ''; ?>>
									<?= $obra->nombre ?>
								</option>
							<?php endwhile; ?>
						</select>
					</div>
					<div class="form-group">
						<?php 
							if(isset($pac) && is_object($pac)){
								$n = ObraSocial::getNumeroObraSocial($pac->id_paciente);
							}
						?>
						<label for="numero_socio">Numero de Afiliado :</label>
						<input type="text" class="form-control" name="numero_afiliado" required value="<?= isset($pac) && is_object($pac) ? $n->numero_socio : 'S/N'; ?>" />
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