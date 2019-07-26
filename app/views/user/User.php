<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <title>Gestión de Usuarios</title>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        input {
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .right {
            float: right;
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="navbar-top-fixed.css" rel="stylesheet">
</head>

<body>
    <h3>Gestión de Usuario</h3>

    <form action="<?= FOLDER_PATH . 'user/newUser' ?>" method="POST">

	<label for="nombre">Nombre</label>
	<input type="text" name="nombre" required/>
	
	<label for="apellidos">Apellido</label>
	<input type="text" name="apellido" required/>
	
	<label for="email">Email</label>
	<input type="email" name="email" required/>
	
	<label for="password">Contraseña</label>
	<input type="password" name="password" required/>
	
	<input type="submit" value="Crear" name="crear" />
</form>
    <aside>
        <div class="col-lg-5">
            <h3>Usuarios</h3>
            <hr />
        </div>

        <section class="col-lg-5 usuario" style="height:450px;overflow-y:scroll;">
            <table>
                <tr>
                    <td>ID</td>
                    <td>Nombre y Apellido</td>
                    <td>Usuario</td>
                </tr>


                <?php foreach ($allusers as $user) { ?>
                    <tr>
                        <td><?php echo $user->id_usuario; ?></td>
                        <td><?php echo $user->nombre_apellido; ?></td>
                        <td><?php echo $user->usuario; ?></td>
                        <td>
                            <div class="right">
                                <a href="<?= FOLDER_PATH . '/User/modUser' ?>/<?php echo $user->id_usuario; ?>" class="btn btn-danger">Modificar</a>
                            </div>
                        </td>
                        <td>
                            <div class="right">
                                <a href="<?= FOLDER_PATH . '/User/deleteById' ?>/<?php echo $user->id_usuario; ?>" class="btn btn-danger">Eliminar</a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </section>
    </aside>
</body>

</html>