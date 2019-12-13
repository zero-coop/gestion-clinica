<?php if (isset($_SESSION['identity'])) : ?>
	<div class="col-10">
		<div class="row">

			<div class="col-12">
				<h1 class="text-center my-4">Gestión Usuarios</h1>

				<a href="<?= base_url ?>usuario/registro">
					<button type="button" class="btn btn-success">Agregar usuario</button>
				</a>
			</div>

			<div class="col-12">

				<?php if (isset($_SESSION['paciente']) && $_SESSION['paciente'] == 'complete') : ?>
					<div class="alert alert-success my-4" role="alert">
						<strong>El usuario se ha agregado correctamente</strong>
					</div>
				<?php endif; ?>

				<?php if (isset($_SESSION['paciente']) && $_SESSION['paciente'] == 'failed') : ?>
					<div class="alert alert-danger my-4" role="alert">
						<strong>El usuario NO se ha agregado correctamente</strong>
					</div>
				<?php endif; ?>

				<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete') : ?>
					<div class="alert alert-info my-4" role="alert">
						<strong>El usuario fue agregado exitosamente</strong>
					</div>
				<?php endif; ?>
				<?php Utils::deleteSession('register'); ?>

				<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete') : ?>
					<div class="alert alert-danger my-4" role="alert">
						<strong>El Usuario ha sido borrado correctamente</strong>
					</div>
				<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete') : ?>
					<div class="alert alert-warning my-4" role="alert">
						<strong>El usuario NO ha sido borrado correctamente</strong>
					</div>
				<?php endif; ?>
				<?php Utils::deleteSession('delete'); ?>


				<table class="table mt-4 table-bordered">
					<thead class="thead-light">
						<tr>
							<th>ID</th>
							<th>USUARIO</th>
							<th>NOMBRE</th>
							<th>APELLIDO</th>
							<th>EMAIL</th>
							<th>ACCIONES</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($usuario = $usuarios->fetch_object()) : ?>
							<tr>
								<td scope="row"><?= $usuario->id; ?></td>
								<td><?= $usuario->nombre_usuario; ?></td>
								<td><?= $usuario->nombre; ?></td>
								<td><?= $usuario->apellido; ?></td>
								<td><?= $usuario->email; ?></td>
								<td>
									<a href="<?= base_url ?>usuario/eliminar&id=<?= $usuario->id ?>"><button type="button" class="btn btn-danger">Eliminar</button></a>
								</td>
							</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>


		</div>
	</div>
<?php else : ?>



<?php endif; ?>