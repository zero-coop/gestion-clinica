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
                      <input type="text" name="usuario" class="form-control form-control-user" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" placeholder="Contraseña">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input">
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

		 

<div class="container-fluid">
	<div class="row">
		<div class="col-2">
		<aside>

		<ul class="list-group mt-4">
		
				
        <li class="list-group-item"><a href="<?=base_url?>paciente/gestion"><i class="fas fa-user-friends"></i> Gestionar pacientes</a></li>
        <li class="list-group-item"><a href="<?=base_url?>pedido/gestion"><i class="fas fa-list-alt"></i> Gestionar atenciones</a></li>
        <li class="list-group-item"><a href="<?=base_url?>pedido/internaciones"><i class="fas fa-clinic-medical"></i> Internaciones</a></li>
        <li class="list-group-item"><a href="<?=base_url?>obrasociales/gestion"><i class="fas fa-id-card"></i> Gestionar Obras Sociales</a></li>
        <li class="list-group-item"><a href="<?=base_url?>medico/index"><i class="fas fa-user-md"></i></i> Gestionar doctores</a></li>
        <li class="list-group-item"><a href="<?=base_url?>recibo/registro"><i class="fas fa-search-dollar"></i> Registro de pagos</a></li>
        <?php if(Utils::showAdmin()): ?>
				  <li class="list-group-item"><a href="<?=base_url?>usuario/gestion"><i class="fas fa-user-edit"></i> Gestiona usuarios</a></li>  
        <?php endif; ?>

			
				<!-- <li class="list-group-item"><a href="<?=base_url?>pedido/mis_pedidos"><i class="fas fa-notes-medical"></i> Mis atenciones</a></li> -->
				
			
				<li class="list-group-item"><a href="<?=base_url?>usuario/logout"><i class="fas fa-times-circle"></i> Cerrar sesión</a></li>
		</aside>
</div>

                <?php endif; ?>








	

		
			
		

