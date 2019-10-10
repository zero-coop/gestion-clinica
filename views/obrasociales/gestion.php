<?php if (isset($_SESSION['identity'])) : ?>
	<div class="col-10">
		<div class="row">

			<div class="col-12">

				.<div class="row">
					<div class="col-12">


						<h1 class="text-center my-4">Gestión de Obras Sociales</h1>
					</div>
					<div class="col-6">


						<a href="<?= base_url ?>paciente/crear">
							<button type="button" class="btn btn-success">Agregar obra social</button>
						</a>
					</div>

				</div>
			</div>


			<div class="col-12">

				<?php if (isset($_SESSION['obra']) && $_SESSION['obra'] == 'complete') : ?>
					<div class="alert alert-success my-4" role="alert">
						<strong>La obra social se ha agregado correctamente</strong>
					</div>
				<?php elseif (isset($_SESSION['obra']) && $_SESSION['obra'] != 'complete') : ?>
					<div class="alert alert-danger my-4" role="alert">
						<strong>La obra social NO se ha agregado correctamente</strong>
					</div>
				<?php endif; ?>
				<?php Utils::deleteSession('obra'); ?>

				<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete') : ?>
					<div class="alert alert-info my-4" role="alert">
						<strong>La obra social ha sido borrada correctamente</strong>
					</div>
				<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete') : ?>
					<div class="alert alert-warning my-4" role="alert">
						<strong>La obra social no ha sido borrado correctamente</strong>
					</div>
				<?php endif; ?>
				<?php Utils::deleteSession('delete'); ?>

				<table class="table mt-4 table-bordered">
					<thead class="thead-light">
						<tr>
							<th>ID</th>
							<th>NOMBRE</th>
							<th>CUIT</th>
							<th>CORREO</th>
							<th>TELEFONO</th>
							<th>DIRECCION</th>
							<th>ACCIONES</th>
						</tr>
					</thead>
					<tbody>
						<?php
							require_once 'models/obrasociales.php';
							$obrasocial = new ObraSocial();
							?>
						<?php while ($obra = $obras->fetch_object()) : ?>
							<tr>
								<td scope="row"><?= $obra->id_obrasociales; ?></td>
								<td><?= $obra->nombre; ?></td>
								<td><?= $obra->cuit; ?></td>
								<td><?= $obra->correo; ?></td>
								<td><?= $obra->telefono; ?></td>
								<td><?= $obra->direccion; ?></td>
								<td>

									<a href="<?= base_url ?>obrasocial/eliminar&id=<?= $pac->id_paciente ?>"><button type="button" class="btn btn-danger">Eliminar</button></a>

								</td>
							</tr>
						<?php endwhile; ?>
						<t/body> </table> </div> </div> </div> </div> </div> <?php else : ?> <div class="col-10">

							<div class="alert alert-warning m-5" role="alert">
								<strong>Necesitas ser andministrador.</strong> Inicia sesion aqui <a href="<?= base_url ?>"></a>
							</div>
			</div>


		<?php endif; ?>