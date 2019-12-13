<?php if (isset($_SESSION['identity'])) : ?>
	<div class="col-10">
		<div class="row">

			<div class="col-12">

				.<div class="row">
					<div class="col-12">


						<h1 class="text-center display-4 my-4">Gestión de Doctores</h1>
					</div>
					<div class="col-6">


						<a href="<?= base_url ?>medico/crear">
							<button type="button" class="btn btn-success my-3">Agregar Doctor</button>
						</a>
						<a href="<?= base_url ?>reporte/medicos" target=_blank>
							<button type="button" class="btn btn-danger">Reporte PDF</button>
						</a>
					</div>

					
				</div>
			</div>


			<div class="col-12">

				<?php if (isset($_SESSION['medico']) && $_SESSION['medico'] == 'complete') : ?>
					<div class="alert alert-success my-4" role="alert">
						<strong>El doctor se ha agregado correctamente</strong>
					</div>
				<?php elseif (isset($_SESSION['medico']) && $_SESSION['medico'] != 'complete') : ?>
					<div class="alert alert-danger my-4" role="alert">
						<strong>El doctor NO se ha agregado correctamente</strong>
					</div>
				<?php endif; ?>
				 <?php Utils::deleteSession('medico'); ?> <!-- ver -->

				<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete') : ?>
					<div class="alert alert-info my-4" role="alert">
						<strong>El doctor ha sido borrado correctamente</strong>
					</div>
				<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete') : ?>
					<div class="alert alert-warning my-4" role="alert">
						<strong>El doctor NO ha sido borrado correctamente</strong>
					</div>
				<?php endif; ?>
				<?php Utils::deleteSession('delete'); ?>

				<table id="example" class="table table-bordered">
					<thead class="thead-light">
						<tr>
							<th>ID</th>
							<th>Apellido y Nombre</th>
							<th>DNI</th>
							<th>Especialidad</th>
							<th>Matricula</th>
							<th>Domicilio</th>
							<th>Telefono</th>
							<th>Celular</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($med = $medicos->fetch_object()) : ?>
							<tr>
								<td scope="row"><?= $med->id_medico; ?></td>
								<td><?= $med->apellido . " , " . $med->nombre; ?></td>
								<td><?= $med->dni; ?></td>
								<td><?= $med->especialidad; ?></td>
								<td><?= $med->matricula; ?></td>
								<td><?= $med->domicilio; ?></td>
								<td><?= $med->telefono; ?></td>
								<td><?= $med->celular; ?></td>
								<td>
									<a href="<?= base_url ?>medico/ver&id=<?= $med->id_medico ?>"><button class="btn btn-primary">Detalles</button></a>
									<a href="<?= base_url ?>medico/editar&id=<?= $med->id_medico ?>"><button class="btn btn-warning">Editar</button></a>
									<a href="<?= base_url ?>medico/eliminar&id=<?= $med->id_medico ?>"><button type="button" class="btn btn-danger">Eliminar</button></a>
								</td>
							</tr>
						<?php endwhile; ?>
						<t/body> </table> </div> </div> </div> </div> </div> <?php else : ?> <div class="col-10">

							<div class="alert alert-warning m-5" role="alert">
								<strong>Necesitas ser administrador.</strong> Inicia sesion aqui <a href="<?= base_url ?>"></a>
							</div>
			</div>


		<?php endif; ?>
			</div>