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
					<h1 class="text-center my-4">Detalles Paciente
						<hr>
					</h1>

				<?php
					else :
						header('Location:' . base_url . 'paciente/gestion');
					endif;
					?>
			</div>
		</div>

		<!-- container pedidos mas columna paciente-->
		<div class="container">
			<div class="row">
				<div class="col-md-auto">
					<!-- Pedidos de los pacientes-->
					<h1 style="text-align:right">Paciente</h1>
					<p></p>
				</div>
				<div class="col-12">
					<!-- One of two columns -->
				</div>
				<div class="col-md-12">
					<!-- columna de datos del paciente -->
					<table class="table table-striped table-hover">
						<tbody>
							<?php
								require_once 'models/obrasociales.php';
								$obrasocial = new ObraSocial();
								?>
							<tr>
								<h3 class=""><?= $pac->nombre . " " . $pac->apellido  ?></h2>
							</tr>
							<tr>
								<td scope="row"><?php echo "Nº " . "" . $pac->id_paciente; ?></td>
							</tr>
							<tr>
								<td><?= $pac->apellido . ", " . $pac->nombre; ?></td>
							</tr>
							<td><?php echo 'DNI: ' . $pac->dni; ?></td>
							<tr>
								<td>
									<?php
										$cumpleanos = new DateTime($pac->fecha_nacimiento);
										$hoy = new DateTime();
										$annos = $hoy->diff($cumpleanos);
										echo "Edad:" . " " . $annos->y;;
										?>
								</td>
							</tr>
							<tr>
								<td><?php echo 'Sexo: ' . $pac->sexo; ?></td>
							</tr>
							<tr>
								<td>
									<?php
										$obra = $obrasocial->getObraSocial($pac->id_paciente);
										$numero_socio = $obrasocial->getNumeroObraSocial($pac->id_paciente);
										if ($obra->id_obrasociales != 0) {
											echo $obra->nombre . " | Numero: " . $numero_socio->numero_socio;
										} else {
											echo $obra->nombre;
										}
										?>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>


	<?php endif; ?>