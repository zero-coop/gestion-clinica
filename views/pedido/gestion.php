<?php if (isset($_SESSION['identity'])) : ?>
    <div class="col-10">
        <div class="row">





            <div class="col-12">

                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center my-4">Gestión de Pedidos de atención</h1>
                    </div>
                    <div class="col-6">
                        <a href="<?= base_url ?>pedido/crear">
                            <button type="button" class="btn btn btn-outline-success my-3">Nueva Consulta</button>
                        </a>
                    </div>
                </div>
            </div>


            <?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete') : ?>
                <div class="alert alert-success my-4" role="alert">
                    <strong>El pedido se creo correctamente</strong>
                </div>
            <?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete') : ?>
                <div class="alert alert-danger my-4" role="alert">
                    <strong>Error al crear el pedido</strong>
                </div>
            <?php endif; ?>
            <?php Utils::deleteSession('pedido'); ?>

            <?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete') : ?>
                <div class="alert alert-info my-4" role="alert">
                    <strong>El pedido ha sido borrado correctamente</strong>
                </div>
            <?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete') : ?>
                <div class="alert alert-warning my-4" role="alert">
                    <strong>Error al borrar el pedido</strong>
                </div>
            <?php endif; ?>
            <?php Utils::deleteSession('delete'); ?>

            <?php if (isset($_SESSION['update']) && $_SESSION['update'] == 'complete') : ?>
                <div class="alert alert-info my-4" role="alert">
                    <strong>El pedido ha sido actualizado correctamente</strong>
                </div>
            <?php endif; ?>
            <?php Utils::deleteSession('update'); ?>
            </div>

            <table id="example" class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>NºAtencion</th>
                        <th>Medico</th>
                        <th>Paciente</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($ped = $pedidos->fetch_object()) :    ?>
                        <tr>
                            <td><?= $ped->id_orden_atencion; ?></td>
                            <td><?= $ped->medicoapellido . " " . $ped->mediconombre; ?></td>
                            <td><?= $ped->pacienteapellido . " ". $ped->pacientenombre; ?></td>
                            <td><?= $ped->descripcion; ?></td>
                            <td>$<?= $ped->precio; ?></td>
                            <td><?= $ped->fecha; ?></td>
                            <td>
                            <a href="<?= base_url ?>recibo/crear&id=<?= $ped->id_orden_atencion ?>"><button class="btn btn-success">Pago</button></a>
                            <a href="<?= base_url ?>pedido/observaciones&id=<?= $ped->id_orden_atencion ?>"><button class="btn btn-info">Observaciones</button></a>
                            <a href="<?= base_url ?>recibo/eliminar&id=<?= $ped->id_orden_atencion ?>"><button class="btn btn-danger">Eliminar</button></a>
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