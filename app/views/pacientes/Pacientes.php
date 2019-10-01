<div class="col-10">
    <div class="row">
        <div class="col-12">

            <h1 class="text-center my-4">Gestionar Pacientes</h1>
            <a href="#">
                <button class="btn btn-success">
                    Nuevo paciente
                </button>
            </a>
            <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                </ul> -->
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Buscar paciente" aria-label="Search">
                    <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            <!-- </div> -->
            <table class="table mt-4 table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>CUIL</th>
                        <th>Sexo</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($pac = $param->fetch_object()) : ?>
                        <tr>
                            <td scope="row"><?= $pac->id_paciente; ?></td>
                            <td><?= $pac->nombre; ?></td>
                            <td><?= $pac->apellido; ?></td>
                            <td><?= $pac->cuil; ?></td>
                            <td><?= $pac->sexo; ?></td>
                            <td>
                                <a href="#"><button type="button" class="btn btn-warning">Editar</button></a>
                                <a href="#"><button type="button" class="btn btn-danger">Eliminar</button></a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>

            </table>
        </div>
    </div>
</div>
</div>
</div>