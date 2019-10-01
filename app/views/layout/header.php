<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Clinica</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="<?= FOLDER_PATH . PATH_VIEWS ?>/layout/assets/css/bootstrap.min.css" /> -->
</head>

<body>
    <!-- CABECERA -->
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 bg-primary">
                    <div class="row">
                        <div class="col-3">
                            <a href="<?= FOLDER_PATH ?>">
                                <img src="<?= FOLDER_PATH . PATH_VIEWS ?>/layout/assets/img/doctora.png" alt="Clinica Logo" width="40%" />
                            </a>
                        </div>
                        <div class="col-3 mt-4">
                            <h1 class=" display-4 text-center text-white">
                                Clinica
                            </h1>
                        </div>
                        <!-- NAV -->
                        <div class="col-12">

                            <nav class="navbar navbar-expand-lg navbar-primary bg-primary">
                                <a class="navbar-brand text-white" href="<?= FOLDER_PATH ?>">Inicio</a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <ul class="navbar-nav mr-auto">
                                    <?php echo $_SESSION['user'];?>
                                </ul>
                                <ul class="navbar-nav px-3">
                                    <li class="nav-item text-nowrap">
                                        <a class="nav-link" href="<?= "login/logout" ?>">Cerrar Sesion</a>
                                    </li>
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>

    </header>