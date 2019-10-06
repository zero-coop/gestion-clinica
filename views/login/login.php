<!DOCTYPE html>
<html lang="es">

<head>
    <title>Maternidad</title>

    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Nuestro css-->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url . "views/login/static/css/index.css" ?>" th:href="@{/css/index.css}">



</head>

<body>
    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="<?php echo base_url . "views/login/static/img/user.png" ?>" th:src="@{/img/user.png}" />

                </div>
                <form class="col-12" action="<?= base_url ?>usuario/login" method="POST">
                    <div class="form-group" id="user-group">
                        <input type="text" class="form-control" placeholder="Nombre de usuario" required name="usuario" />
                    </div>
                    <div class="form-group" id="contrasena-group">
                        <input type="password" class="form-control" placeholder="Contraseña" required name="password" />
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Ingresar </button>
                </form>
                <?php if (!empty($_SESSION['login_error'])) : ?>
                    <div class="alert alert-danger" role="alert">
                        Usuario y/o contraseña incorrectos.
                    </div>
                <?php endif; ?>
                <!-- <?php if (isset($_SESSION['logout'])) : ?>
                    <div class="alert alert-success" role="alert">
                        Se cerro sesion exitosamente.
                    </div>
                <?php endif; ?> -->
            </div>
        </div>
    </div>
</body>

</html>