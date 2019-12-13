<div class="col-10">
<div class="row">
	<div class="offset-1 col-10 text-center ">


		
		.
		<?php while ($det = $detalles->fetch_object()): ?>
			<h2 class="my-4"></h2>
			
			<div class="card text-white bg-secondary mb-3 d-inline-block" style="min-width: 100%;">
				<div class="card-header text-dark"><h4>Paciente : <?=$det->pacienteapellido . " " . $det->pacientenombre?></h4></div>
				<div class="card-header text-secondary "><h4>Doctor : <?=$det->medicoapellido . " " . $det->mediconombre?></h4></div>
				<div class="card-body">
					<h4>N°RECIBO :<?= " " . $det->id . " " . "/ ". " "."FECHA:". " ". $det->fecha?></h4>
					<h4>N°ORDEN :<?= " " . $det->id_orden . " " . "/ " . " ". " ". "FECHA:" . " " . $det->fechaorden?></h4>
					<h4>SERVICIO :<?= " " . $det->descripcion?></h4>
					<h4>OBSERVACIONES :<?= " " . $det->observacion?></h4>
					<h4>METODO DE PAGO :<?= " " . $det->metodo?></h4>
					<h4>PAGO :<?= " " . " $". $det->monto?></h4>
				</div>
				
			
				
				
				
				
				
				
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</div>