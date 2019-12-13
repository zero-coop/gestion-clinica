<?php if (isset($_SESSION['identity'])) : ?>
	<div class="offset-1 col-8">

		<h1 class="text-center my-4">Registrar Usuario</h1>

		<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete') : ?>
			<div class="alert alert-success" role="alert">

				<strong>Registro completado correctamente</strong>
			</div>

		<?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed') : ?>
			<div class="alert alert-danger" role="alert">
				<strong>Registro fallido, introduce bien los datos</strong>

			</div>

		<?php endif; ?>
		<?php Utils::deleteSession('register'); ?>

		<form action="<?= base_url ?>usuario/save" method="POST">

			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input class="form-control" type="text" name="nombre" required />
			</div>
			<div class="form-group">

				<label for="apellidos">Apellido</label>
				<input class="form-control" type="text" name="apellidos" required />
			</div>
			<div class="form-group">

				<label for="email">Email</label>
				<input class="form-control" type="email" name="email" required />
			</div>
			<div class="form-group">
				<label for="nombre">Usuario</label>
				<input class="form-control" type="text" name="nombre_usuario" required />
			</div>
			<div class="form-group">
				<label for="password">Contraseña</label>
				<input class="form-control" type="password" name="password" required />
			</div>
			<div class="form-group">
				<label for="rol">Tipo de Usuario :</label>
				<select class="form-control" name="rol">

					<option value="user" selected>
						Usuario
					</option>
					<option value="admin">
						Administrador
					</option>
				</select>

			</div>
			<div class="form-group">
				<button class="form-control btn btn-success" type="submit" value="Registrarse">Registrar</button>
			</div>
		</form>
	</div>
	</div>
	</div>
<?php else : ?>



<?php endif; ?>