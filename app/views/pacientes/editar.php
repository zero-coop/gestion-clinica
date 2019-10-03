<div class="col-10">

    <div class="row">
        <div class="col-12">
            <h1 class="text-center my-4">Nuevo paciente</h1>
            

        </div>

        <div class="offset-1 col-8">




            <form action="<?= FOLDER_PATH . 'pacientes/guardarpaciente'?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" required value="<?= isset($pac) && is_object($pac) ? $pac->nombreyApellido : ''; ?>" />

                </div>
                <div class="form-group">
                    <label for="nombre">Apellido :</label>
                    <input type="text" class="form-control" name="apellido" required value="<?= isset($pac) && is_object($pac) ? $pac->nombreyApellido : ''; ?>" />

                </div>
                <div class="form-group">
                    <label for="nombre">Cuil :</label>
                    <input type="text" class="form-control" name="cuil" required value="<?= isset($pac) && is_object($pac) ? $pac->nombreyApellido : ''; ?>" />

                </div>
                <div class="form-group">
                    <label for="sexo">Sexo :</label>
                    <input type="text" class="form-control" name="sexo" required value="<?= isset($pac) && is_object($pac) ? $pac->sexo : ''; ?>" />

                </div>
                <div class="form-group">
                    <label for="telefono">Telefono :</label>
                    <input type="number" class="form-control" name="telefono" required value="<?= isset($pac) && is_object($pac) ? $pac->telefono : ''; ?>" />

                </div>
                <div class="form-group">
                    <label for="direccion">Direccion :</label>
                    <input type="text" class="form-control" name="direccion" required value="<?= isset($pac) && is_object($pac) ? $pac->direccion : ''; ?>" />

                </div>
                <div class="form-group">
                    <label for="ciudad">Provincia :</label>
                    <input type="number" class="form-control" name="provincia" required value="<?= isset($pac) && is_object($pac) ? $pac->ciudad : ''; ?>" />

                </div>
                <div class="form-group">
                    <label for="ciudad">Historia clinica :</label>
                    <input type="number" class="form-control" name="historia" required value="<?= isset($pac) && is_object($pac) ? $pac->ciudad : ''; ?>" />

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