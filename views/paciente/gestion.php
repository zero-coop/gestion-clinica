<?php if (isset($_SESSION['identity'])) : ?>
	<div class="col-10">
		<div class="row">

			<div class="col-12">

				.<div class="row">
					<div class="col-12">


						<h1 class="text-center my-4">Gestión de pacientes</h1>
					</div>
					<div class="col-6">


						<a href="<?= base_url ?>paciente/crear">
							<button type="button" class="btn btn-success">Agregar paciente</button>
						</a>
					</div>

					<div class="offset-2 col-4">
						<form class="form-inline my-2 my-lg-0">
							<input class="form-control mr-sm-2" type="text" placeholder="Buscar paciente" aria-label="Search">
							<button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
						</form>
					</div>
				</div>
			</div>


			<div class="col-12">

				<?php if (isset($_SESSION['paciente']) && $_SESSION['paciente'] == 'complete') : ?>
					<div class="alert alert-success my-4" role="alert">
						<strong>El paciente se ha agregado correctamente</strong>
					</div>
				<?php elseif (isset($_SESSION['paciente']) && $_SESSION['paciente'] != 'complete') : ?>
					<div class="alert alert-danger my-4" role="alert">
						<strong>El paciente NO se ha agregado correctamente</strong>
					</div>
				<?php endif; ?>
				<?php Utils::deleteSession('paciente'); ?>

				<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete') : ?>
					<div class="alert alert-info my-4" role="alert">
						<strong>El paciente ha sido borrado correctamente</strong>
					</div>
				<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete') : ?>
					<div class="alert alert-warning my-4" role="alert">
						<strong>El paciente NO ha sido borrado correctamente</strong>
					</div>
				<?php endif; ?>
				<?php Utils::deleteSession('delete'); ?>

				<table class="table mt-4 table-bordered">
					<thead class="thead-light">
						<tr>
							<th>Ver</th>
							<th>ID</th>
							<th>APELLIDO Y NOMBRE</th>
							<th>DNI</th>
							<th>EDAD</th>
							<th>SEXO</th>
							<th>OBRA SOCIAL</th>
							<th>ACCIONES</th>
						</tr>
					</thead>
					<tbody>
						<?php
							require_once 'models/obrasociales.php';
							$obrasocial = new ObraSocial();
							?>
						<?php while ($pac = $pacientes->fetch_object()) : ?>
						<?php if ($pac->habilitado && Utils::isAdmin()) :?>
							<tr>
								<th>O</th>
								<td scope="row"><?= $pac->id_paciente; ?></td>
								<td><?= $pac->apellido . ", " . $pac->nombre; ?></td>
								<td><?= $pac->dni; ?></td>
								<td>
									<?php
										$cumpleanos = new DateTime($pac->fecha_nacimiento);
										$hoy = new DateTime();
										$annos = $hoy->diff($cumpleanos);
										echo $annos->y;;
									?>
								</td>

								<td><?= $pac->sexo; ?></td>

								<td><?php
											$obra = $obrasocial->getObraSocial($pac->id_paciente);
											echo $obra->nombre . " | Numero: ";
											?>
								</td>
								<td>

									<a href="<?= base_url ?>paciente/eliminar&id=<?= $pac->id_paciente ?>"><button type="button" class="btn btn-danger">Eliminar</button></a>

								</td>
							</tr>
							<?php endif; ?>
						<?php endwhile; ?>
						<t/body> </table> </div> </div> </div> </div> </div> <?php else : ?> <div class="col-10">

							<div class="alert alert-warning m-5" role="alert">
								<strong>Necesitas ser andministrador.</strong> Inicia sesion aqui <a href="<?= base_url ?>"></a>
							</div>
			</div>


		<?php endif; ?>