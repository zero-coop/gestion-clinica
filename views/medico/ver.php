<div class="col-10">
<div class="row">
	<div class="offset-1 col-10 text-center ">


		
		.
		<?php while ($med = $medicos->fetch_object()): ?>
			<h2 class="my-4"></h2>
			
			<div class="card text-white bg-info mb-3 d-inline-block" style="min-width: 100%;">
				<div class="card-header text-dark"><h4>Doctor <?=$med->apellido . " " . $med->nombre?></h4></div>
				<div class="card-body">
					<h4>DNI :<?= " " . $med->dni?></h4>
					<h4>ESPECIALIDAD :<?= " " . $med->especialidad?></h4>
					<h4>MATRICULA :<?= " " . $med->matricula?></h4>
					<h4>DIRECCION :<?= " " . $med->domicilio?></h4>
					<h4>TELEFONO FIJO :<?= " " . $med->telefono?></h4>
					<h4>CELULAR :<?= " " . $med->celular?></h4>
				</div>
				
			
				
				
				
				
				
				
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</div>