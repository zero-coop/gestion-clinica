<?php 
//dashboard paciente
// - traemos la info basica del paciente
// - traemos los pedidos del paciente
// - habilitamos el crud del pedido
// - traemos la historia clinica del paciente
?>

<?php if (isset($_SESSION['identity'])) : ?>
	<div class="col-10">

		<div class="row">
			<div class="col-12">

				<?php if (isset($pac) && is_object($pac)) : ?>
					<h1 class="text-center my-4">Detalles Paciente <?= $pac->nombre . " ".$pac->apellido  ?></h1>
			
				<?php 
					else : 
						header('Location:' . base_url . 'paciente/gestion');
					endif; 
				?>
			</div>
		</div>

<?php endif; ?>