<!-- BARRA LATERAL -->
		<?php if(!isset($_SESSION['identity'])): ?>

		<!-- <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
				<h1 class="text-center">Iniciar Sesion</h1>
                    <img src="" th:src="@{/img/user.png}" />

                </div>
                <form class="col-12" action="<?=base_url?>usuario/login" method="POST">
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

	<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Iniciar Sesion</h1>
                  </div>
                  <form action="<?=base_url?>usuario/login" method="POST" class="user">
                    <div class="form-group">
                      <input type="text" name="usuario" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="Email" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Contraseña">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Iniciar
                    </button>


                  </form>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
			<?php else: ?>

		 <div class="col-2">
		<!-- <h3 class="text-center my-3">Iniciar Sesion</h3>
			<form action="<?=base_url?>usuario/login" method="post">
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
		
				
        <li class="list-group-item"><a href="<?=base_url?>paciente/gestion">Gestionar pacientes</a></li>
        <li class="list-group-item"><a href="<?=base_url?>pedido/gestion">Gestionar atenciones</a></li>
        <?php if(Utils::showAdmin()): ?>
          <li class="list-group-item"><a href="<?=base_url?>obrasociales/gestion">Gestionar Obras Sociales</a></li>
          <li class="list-group-item"><a href="<?=base_url?>doctor/index">Gestionar doctores</a></li>				
				  <li class="list-group-item"><a href="<?=base_url?>usuario/gestion">Gestiona usuarios</a></li>
        <?php endif; ?>

			
				<li class="list-group-item"><a href="<?=base_url?>pedido/mis_pedidos">Mis atenciones</a></li>
				
				<?php $stats = Utils::statsCarrito(); ?>
				<li class="list-group-item"><a href="<?=base_url?>carrito/index">Pacientes (<?=$stats['count']?>)</a></li>
				<li class="list-group-item"><a href="<?=base_url?>carrito/index">Ver todo</a></li>
				<li class="list-group-item"><a href="<?=base_url?>usuario/logout">Cerrar sesión</a></li>
		</aside>
</div>

                <?php endif; ?>








	

		
			
		

