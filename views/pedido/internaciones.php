<?php if (isset($_SESSION['identity'])) : ?>
    <div class="col-10">
        <div class="row">





            <div class="col-12">

                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center my-4">Pacientes Internados</h1>
                    </div>
                    <div class="col-6">
                        <a href="<?= base_url ?>pedido/crear">
                            <button type="button" class="btn btn-success my-3">Internacion</button>
                        </a>
                    </div>
                </div>
            </div>

            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>NºAtencion</th>
                        <th>Medico</th>
                        <th>Paciente</th>
                        <th>Fecha Inicio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($to = $todos->fetch_object()) :    ?>
                        <tr>
                            <td><?= $to->id_orden_atencion; ?></td>
                            <td><?= $to->medicoapellido . " " . $to->mediconombre; ?></td>
                            <td><?= $to->pacienteapellido . " ". $to->pacientenombre; ?></td>
                            <td><?= $to->fecha; ?></td>
                            <td>
                            <a href="<?= base_url ?>pedido/darAlta&id=<?= $to->id_orden_atencion ?>"><button class="btn btn-success">Alta</button></a>
                            <a href="<?= base_url ?>pedido/observaciones&id=<?= $to->id_orden_atencion ?>"><button class="btn btn-info">Observaciones</button></a>
                            <a href="<?= base_url ?>recibo/crear&id=<?= $to->id_orden_atencion ?>"><button class="btn btn-warning">Pago</button></a>
                            </td>
                            <!-- <td scope="row">
				<a href="<//?= base_url ?>pedido/detalle&id=<//?= $ped->id ?>"><//?= $ped->id ?></a>
			</td> -->
                            <!-- <td>
				<//?=Utils::showStatus($ped->estado)?>
			</td> -->
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
<?php else : ?>
    <div class="col-10">
        <div class="alert alert-warning m-5" role="alert">
            <strong>Necesitas ser andministrador.</strong> Inicia sesion aqui <a href="<?= base_url ?>"></a>
        </div>
    </div>
<?php endif; ?>