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

                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav mr-auto">


                                    </ul>
                                    <form class="form-inline my-2 my-lg-0">
                                        <input class="form-control mr-sm-2" type="text" placeholder="Buscar paciente" aria-label="Search">
                                        <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
                                    </form>
                                </div>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>

    </header>