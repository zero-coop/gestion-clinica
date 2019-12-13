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
					<div class="offset-1 col-11">

						<?php if (isset($pac) && is_object($pac)) : ?>
							<h1 class=" my-4">Nuevo Pedido

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
								<?php
									if (isset($_GET['id'])) {
										$id_paciente = $_GET['id'];
									}
									?>
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

							</tbody>
						</table>

						<form action="http://localhost/gestion-clinica/pedido/save" method="POST">

							<input type="number" style="visibility:hidden" id="" class="form-control" value="<?php echo $id_paciente; ?>" name="id_paciente" placeholder="">

							<div class="form-group">
								<label for="medico">Medico :</label>
								<?php $medicos = medico::getAllNombre(); ?>
								<select class="form-control" name="medico">
									<?php while ($medico = $medicos->fetch_object()) : ?>
										<option value="<?= $medico->id_medico ?>">
											<?= $medico->apellido . ', ' . $medico->nombre . ' | ' . $medico->especialidad ?>
										</option>
									<?php endwhile; ?>
								</select>
							</div>
							<div class="form-group">
								<label for="servicio">Servicio :</label>
								<?php $servicios = Pedido::getAllServicios(); ?>
								<select class="form-control" name="servicio">
									<?php while ($servi = $servicios->fetch_object()) : ?>
										<option value="<?= $servi->id_servicio ?>" <?= isset($ser) && is_objet($ser) && $ped->id_servicio == $medico->id_servicio ? 'selected' : ''; ?>>
											<?= $servi->descripcion ?>
										</option>
									<?php endwhile; ?>
								</select>
							</div>
							<div class="form-group">
								<label for="">Precio:</label>
								<input type="text" class="form-control" name="precio">
							</div>
							<div class="form-group">
								<label for="">Medicamentos:</label>
								<textarea class="form-control" rows="5" id="" name="medicamento"></textarea>
							</div>
							<div class="form-group">
								<label for="">Observaciones:</label>
								<textarea class="form-control" rows="5" id="" name="observaciones"></textarea>
							</div>


							<div class="form-group">
								<button type="submit" class="btn btn-primary mt-2" value="Guardar">Guardar</button>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php endif; ?>