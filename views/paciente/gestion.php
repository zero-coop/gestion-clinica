<?php if (isset($_SESSION['identity'])) : ?>
	<div class="col-10">
		<div class="row">

			<div class="col-12">
				<h1 class="text-center my-4">Gestión de pacientes</h1>

				<a href="<?= base_url ?>paciente/crear">
					<button type="button" class="btn btn-success">Agregar paciente</button>
				</a>
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
							<th>ID</th>
							<th>NOMBRE Y APELLIDO</th>
							<th>CUIL</th>
							<th>SEXO</th>
							<th>Obra Social</th>
							<th>ACCIONES</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						require_once 'models/obrasocial.php';
						$obrasocial = new ObraSocial();
			
					?>
						<?php while ($pac = $pacientes->fetch_object()) : ?>
							<tr>
								<td scope="row"><?= $pac->id_paciente; ?></td>
								<td><?= $pac->nombre ." ". $pac->apellido; ?></td>
								<td><?= $pac->cuil; ?></td>
								<td><?= $pac->sexo; ?></td>
								<?php $obrasocial->getObraSocial($pac->id_paciente); ?>
								<td><?php var_dump($obra);  ?></td>
								<td>
									<a href="<?= base_url ?>paciente/editar&id=<?= $pac->id ?>"><button type="button" class="btn btn-warning">Editar</button></a>
									<a href="<?= base_url ?>paciente/eliminar&id=<?= $pac->id ?>"><button type="button" class="btn btn-danger">Eliminar</button></a>
									<a href="<?= base_url ?>paciente/editar&id=<?= $pac->id ?>"><button type="button" class="btn btn-warning">Editar</button></a>
								</td>
							</tr>
						<?php endwhile; ?>
						<t/body> </table> </div> </div> </div> </div> </div> <?php else : ?> <div class="col-10">

							<div class="alert alert-warning m-5" role="alert">
								<strong>Necesitas ser andministrador.</strong> Inicia sesion aqui <a href="<?= base_url ?>"></a>
							</div>
			</div>


		<?php endif; ?>