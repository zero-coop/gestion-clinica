<?php
//dashboard paciente
// - traemos la info basica del paciente
// - traemos los pedidos del paciente
// - habilitamos el crud del pedido
// - traemos la historia clinica del paciente
?>

<?php if (isset($_SESSION['identity'])) : ?>
	<div class="col-10 mt-3">
		<div class="card">
			<div class="card-body">

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


					<div class="offset-1 col-10">
						<!-- columna de datos del paciente -->
						<table class="table table-striped table-hover">
							<tbody>
								<?php
									require_once 'models/obrasociales.php';
									$obrasocial = new ObraSocial();
									?>
								<tr>
									<h3 class="text-center"><?= $pac->nombre . " " . $pac->apellido  ?></h2>
								</tr>
								<tr>
									<td scope="row"><?php echo "Paciente Nº " . "" . $pac->id_paciente; ?></td>
								</tr>
								<tr>
									<td><?= $pac->apellido . ", " . $pac->nombre; ?></td>
								</tr>
								<td>Dni : <?= $pac->dni; ?></td>
								<tr>
									<td>
										<?php
											$cumpleanos = new DateTime($pac->fecha_nacimiento);
											$hoy = new DateTime();
											$annos = $hoy->diff($cumpleanos);
											echo "Edad :" . " " . $annos->y;;
											?>
									</td>
								</tr>
								<tr>
									<td>Sexo : <?= $pac->sexo; ?></td>
								</tr>
								<tr>
									<td>
										<?php
											$obra = $obrasocial->getObraSocial($pac->id_paciente);
											$numero_socio = $obrasocial->getNumeroObraSocial($pac->id_paciente);
											if ($obra->id_obrasociales != 0) {
												echo "Obra Social : " . $obra->nombre . " | Numero: " . $numero_socio->numero_socio;
											} else {
												echo $obra->nombre;
											}
											?>
									</td>
								</tr>
								<tr>
									<td>
										<a href="<?= base_url ?>paciente/editar&id=<?= $pac->id_paciente ?>">
											<button type="button" class="btn btn-warning">Editar</button>
										</a>
										<a href="<?= base_url ?>reporte/pacientebyid" target=_blank>
											<button type="button" class="btn btn-danger">Reporte PDF</button>
										</a>
									</td>
								</tr>

							</tbody>
						</table>
					</div>
				</div>
			</div>

		</div>
	</div>


<?php endif; ?>