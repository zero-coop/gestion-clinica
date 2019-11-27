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
                        <button type="button" class="btn btn-success">Nuevo Pedido</button>
                    </a>
                </div>

        <div class="offset-2 col-4">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="text" placeholder="Buscar Pedido" aria-label="Search">
                        <button class="btn btn-info my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
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

        <table class="table mt-4 table-bordered">
            <thead class="thead-light">
                    <tr>
                        <th>NºAtencion</th>
                        <th>Medico</th>
                        <th>Paciente</th>
                        <th>Servicio</th>
                        <th>Recibo</th>
                        <th>Descripcion</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
            <tbody>
			    <?php while ($ped = $pedidos->fetch_object()) :	?>
                <tr>
                    <td><?= $ped->id_orden_atencion; ?></td>
                    <td><?= Pedido::getMedico($ped->id_medico); ?></td>					
                    <td><?= Pedido::getPaciente($ped->id_pacientexobrasocial); ?></td>
                    <td><?= Pedido::getServicio($ped->id_servicio); ?></td>
                    <td><?= $ped->id_recibo; ?></td>
                    <td><?= $ped->descripcion; ?></td>
                    <td><?= $ped->fecha; ?></td>
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
<?php else: ?>
<div class="col-10">
    <div class="alert alert-warning m-5" role="alert">
        <strong>Necesitas ser andministrador.</strong> Inicia sesion aqui <a href="<?=base_url?>"></a>
    </div>
</div>
<?php endif; ?>