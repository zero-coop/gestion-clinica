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
                        <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </div>



        <table class="table mt-4 table-bordered">
            <thead class="thead-light">
                <thead>
                    <tr>
                        <th>Nº Atencion</th>
                        <th>Medico</th>
                        <th>Paciente</th>
                        <th>Medicamento</th>
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
                    <td><?= $ped->id_medico; ?></td>					
					<td><?=	print_r (Pedido::getPaciente($ped->id_pacientexobrasocial)); ?></td>					
                    <td><?= $ped->id_medicamento; ?></td>
                    <td><?= $ped->id_servicio; ?></td>
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