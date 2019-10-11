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
			
			<?php if (isset($dashboard) && isset($pac) && is_object($pac)) : ?>
					<h1 class="text-center my-4">Dashboard <?= $pac->apellido . ", ". $pac->nombre ?></h1>
					<?php $url_action = base_url . "paciente/dashboard&id=" . $pac->id_paciente; ?>

				<?php else : ?>
					<h1 class="text-center my-4">Nuevo paciente</h1>
					<?php $url_action = base_url . "paciente/save"; ?>
				<?php endif; ?>

				<div class="row">
					<div class="col-12">


						<h1 class="text-center my-4">Dashboard</h1>
					</div>
					<div class="col-6">


						<a href="<?= base_url ?>paciente/crear">
							<button type="button" class="btn btn-success">agregar pedido?</button>
						</a>
					</div>

					
				</div>
			</div>


            <table class="table mt-4 table-bordered">
					<thead class="thead-light">
                    <//?php while ($pac = $pacientes->fetch_object()) : ?>
                        <tr>
							<td>Nombre:</td>
							<td><?= $pac->apellido . ", " . $pac->nombre; ?></td>  
                        </tr>
                        </thead>
					<//?php endwhile; ?>
                        </table>


                        <div class="col-
		<?php endif; ?>0">
 </div> </div> 