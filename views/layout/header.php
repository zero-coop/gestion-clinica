<!DOCTYPE HTML>
<html lang="es">

<head>
	<meta charset="utf-8" />
	<title>Clinica</title>
	<link rel="stylesheet" href="<?= base_url ?>assets/css/cl-admin.min.css" />
	<?php if (!isset($_SESSION['identity'])) : ?>
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

	<?php endif; ?>
</head>

<body class="">
	<?php if (!isset($_SESSION['identity'])) : ?>
		<!-- CABECERA -->
	<?php else : ?>
		<header>
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 bg-primary">
						<div class="row">
							<div class="col-3">
							</div>

							<!-- NAV -->
							<div class="col-12">

								<nav class="navbar navbar-expand-lg navbar-primary bg-primary">
									<a class="navbar-brand text-white" href="<?= base_url ?>">Inicio</a>
									<a class="navbar-brand text-white"><?= $_SESSION['identity']->nombre ?> <?= $_SESSION['identity']->nombre ?></a>
									<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
										<span class="navbar-toggler-icon"></span>
									</button>

									<div class="collapse navbar-collapse" id="navbarSupportedContent">
										<ul class="navbar-nav mr-auto">
											<!-- <?php $doctores = Utils::showDoctores(); ?>
  <?php while ($doc = $doctores->fetch_object()) : ?>
      <li class="nav-item active">
        <a class="nav-link text-white" href="<?= base_url ?>doctor/ver&id=<?= $doc->id ?>"><?= $doc->nombreyApellido ?> <span class="sr-only">(current)</span></a>
      </li>
	  <?php endwhile; ?> -->
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
			</div>

		<?php endif; ?>