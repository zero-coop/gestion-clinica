<?php if (isset($_SESSION['identity'])) : ?>
	<div class="col-10">
		<div class="row">

			<div class="col-12">

				<div class="row">
					<div class="col-12">


						<h1 class="text-center my-4">Gestión de pacientes</h1>
					</div>
					<div class="col-6">


						<a href="<?= base_url ?>reporte/pdf">
							<button type="button" class="btn btn-danger">PDF</button>
						</a>
						<a href="<?= base_url ?>paciente/crear">
							<button type="button" class="btn btn-success">Agregar paciente</button>
						</a>
					</div>

					
				</div>
			</div>


			<div class="col-12 my-3">

				<?php if (isset($_SESSION['paciente']) && $_SESSION['paciente'] == 'complete') : ?>
					<div class="alert alert-success my-4" role="alert">
						<strong>El paciente se ha agregado correctamente</strong>
					</div>
				<?php endif; ?>

				<?php if (isset($_SESSION['paciente']) && $_SESSION['paciente'] == 'failed') : ?>
					<div class="alert alert-danger my-4" role="alert">
						<strong>El paciente NO se ha agregado correctamente</strong>
					</div>
				<?php endif; ?>

				<?php if (isset($_SESSION['paciente']) && $_SESSION['paciente'] == 'existe') : ?>
					<div class="alert alert-danger my-4" role="alert">
						<strong>El paciente ya esta en la BASE DE DATOS</strong>
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

				<?php if (isset($_SESSION['update']) && $_SESSION['update'] == 'complete') : ?>
					<div class="alert alert-info my-4" role="alert">
						<strong>El paciente ha sido actualizado correctamente</strong>
					</div>
				<?php endif; ?>
				<?php Utils::deleteSession('update'); ?>
				<table class="table table-striped table-hover" id="example">
					<thead class="thead-light">
						<tr>
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
							<?php if ($pac->habilitado || Utils::showAdmin()) : ?>
								<tr>
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

									<td>
										<?php
													$obra = $obrasocial->getObraSocial($pac->id_paciente);
													if ($obra->id_obrasociales != 0) {
														$numero_socio = ObraSocial::getNumeroObraSocial($pac->id_paciente);
														echo $obra->nombre . " | Numero: " . $numero_socio->numero_socio;
													} else {
														echo $obra->nombre;
													}
													?>
									</td>
									<td>
										<?php if ($pac->habilitado) : ?>
											<a href="<?= base_url ?>paciente/dashboard&id=<?= $pac->id_paciente ?>"><button type="button" class="btn btn-primary">Detalle</button></a>
											<a href="<?= base_url ?>pedido/crear&id=<?= $pac->id_paciente ?>"><button type="button" class="btn btn-outline-dark">Nueva Consulta</button></a>
											
											<a href="<?= base_url ?>paciente/editar&id=<?= $pac->id_paciente ?>"><button type="button" class="btn btn-warning">Editar</button></a>
											<a href="<?= base_url ?>pedido/historia&id=<?= $pac->id_paciente ?>"><button type="button" class="btn btn-info">Historia</button></a>
											<a href="<?= base_url ?>carrito/add&id=<?= $pac->id_paciente ?>"><button type="button" class="btn btn-success">Pagos</button></a>
											<a href="<?= base_url ?>paciente/eliminar&id=<?= $pac->id_paciente ?>"><button type="button" class="btn btn-danger">Eliminar</button></a>
										<?php elseif (!$pac->habilitado || Utils::showAdmin()) : ?>
											<a href="<?= base_url ?>paciente/habilitar&id=<?= $pac->id_paciente ?>"><button type="button" class="btn btn-secondary">Habilitar</button></a>
										<?php endif; ?>
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