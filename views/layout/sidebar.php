<!-- BARRA LATERAL -->
<?php if (!isset($_SESSION['identity'])) : ?>

  <!-- <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
				<h1 class="text-center">Iniciar Sesion</h1>
                    <img src="" th:src="@{/img/user.png}" />

                </div>
                <form class="col-12" action="<?= base_url ?>usuario/login" method="POST">
                    <div class="form-group" id="user-group">
                        <input type="text" class="form-control" placeholder="Email" required name="email" />
                    </div>
                    <div class="form-group" id="contrasena-group">
                        <input type="password" class="form-control" placeholder="Contraseña" required name="password" />
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Ingresar </button>
                </form>
            </div>
        </div>
    </div> -->

  <div class="modal-dialog text-center">
    <div class="col-sm-8 main-section">
      <div class="modal-content">
        <div class="col-12 user-img">
          <img src="<?php echo base_url . "views/login/static/img/user.png" ?>" th:src="@{/img/user.png}" />

        </div>
        <form class="col-12" action="<?= base_url ?>usuario/login" method="POST">
          <div class="form-group" id="user-group">
            <input type="text" class="form-control" placeholder="Nombre de usuario" required name="usuario" />
          </div>
          <div class="form-group" id="contrasena-group">
            <input type="password" class="form-control" placeholder="Contraseña" required name="password" />
          </div>
          <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Ingresar </button>
        </form>
        <?php if (!empty($_SESSION['login_error'])) : ?>
          <div class="alert alert-danger" role="alert">
            Usuario y/o contraseña incorrectos.
          </div>
        <?php endif; ?>
        <!-- <?php if (isset($_SESSION['logout'])) : ?>
                    <div class="alert alert-success" role="alert">
                        Se cerro sesion exitosamente.
                    </div>
                <?php endif; ?> -->
      </div>
    </div>
  </div>

<?php else : ?>

  <div class="col-2">
    <!-- <h3 class="text-center my-3">Iniciar Sesion</h3>
			<form action="<?= base_url ?>usuario/login" method="post">
				<label for="email">Email :</label>
				<input class="form-control" type="email" name="email" />
				<label for="password">Contraseña :</label>
				<input class="form-control" type="password" name="password" />
				<button class="btn btn-primary my-3 form-control" type="submit" value="Enviar">Iniciar</button>
			</form> -->



  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-2">
        <aside>

          <ul class="list-group mt-4">

            <li class="list-group-item"><a href="<?= base_url ?>doctor/index">Gestionar doctores</a></li>
            <li class="list-group-item"><a href="<?= base_url ?>paciente/gestion">Gestionar pacientes</a></li>
            <li class="list-group-item"><a href="<?= base_url ?>pedido/gestion">Gestionar atenciones</a></li>
            <li class="list-group-item"><a href="<?= base_url ?>usuario/gestion">Gestiona usuarios</a></li>



            <li class="list-group-item"><a href="<?= base_url ?>pedido/mis_pedidos">Mis atenciones</a></li>

            <?php $stats = Utils::statsCarrito(); ?>
            <li class="list-group-item"><a href="<?= base_url ?>carrito/index">Pacientes (<?= $stats['count'] ?>)</a></li>
            <li class="list-group-item"><a href="<?= base_url ?>carrito/index">Ver todo</a></li>
            <li class="list-group-item"><a href="<?= base_url ?>usuario/logout">Cerrar sesión</a></li>
        </aside>
      </div>

    <?php endif; ?>