<?php if (isset($_SESSION['identity'])) : ?>




	<div class="col-10 mt-3">

		<div class="row">




			<div class="col-12">
				<h2 class="text-center my-5 display-4">Clinica</h2>
			</div>
			<div class="col-12">
			<div class="row mt-3">
				
				
			

			<?php while ($pacient = $npacientes->fetch_object()) : ?>	

			<div class="col-3">
			<a href="<?=base_url?>paciente/gestion">

			
		<div class="card text-white bg-primary mb-3 d-inline-block" style="min-width: 100%;">
	
		<div class="card-body">
		<h1 class="text-center"><i class="fas fa-user-friends"></i></h1>
			<h4 class="card-title text-center">Pacientes</h4>
			<h4 class="card-text text-center"><?php echo $pacient->numero?></h4>
		</div>
		</div>
			</a>
			</div>
			<div class="col-3">
			<a href="<?=base_url?>medico/index">
			<?php endwhile; ?>
			<?php while ($medic = $medicos->fetch_object()) : ?>	
		<div class="card text-white bg-success mb-3 d-inline-block" style="min-width: 100%;">
	
		<div class="card-body">
		     <h1 class="text-center"><i class="fas fa-user-md"></i></h1>
			<h4 class="card-title text-center">Doctores</h4>
			<h4 class="card-text text-center"><?php echo $medic->numero?></h4>
		</div>
			<?php endwhile; ?>
		</div>
			</a>
		</div>
			<div class="col-3">
			<a href="<?=base_url?>pedido/gestion">
			<?php while ($ped = $pedidos->fetch_object()) : ?>	
		<div class="card text-white bg-warning mb-3 d-inline-block" style="min-width: 100%;">
	
		<div class="card-body">
		<h1 class="text-center"><i class="fas fa-list-alt"></i></h1>
			<h4 class="card-title text-center">Atenciones</h4>
			<h4 class="card-text text-center"><?php echo $ped->numero?></h4>
		</div>
			<?php endwhile; ?>
		</div>
			</a>
		</div>
			<div class="col-3">
			<a href="<?=base_url?>recibo/registro">
			<?php while ($ing = $ingresos->fetch_object()) : ?>	
		<div class="card text-white bg-info mb-3 d-inline-block" style="min-width: 100%;">
	
		<div class="card-body">
		<h1 class="text-center"><i class="fas fa-dollar-sign"></i></h1>
			<h4 class="card-title text-center">Ingreso Mensual</h4>
			<h4 class="card-text text-center">$<?php echo $ing->total?></h4>
		</div>
			 <?php endwhile; ?>
		</div>
			</a>
		</div>


			


			</div>

			</div>


	</div>
	
<?php endif; ?>