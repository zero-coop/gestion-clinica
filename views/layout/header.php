<!DOCTYPE HTML>
<html lang="es">

<head>
	<meta charset="utf-8" />
	<title>Clinica</title>
	<link rel="stylesheet" href="<?= base_url ?>assets/css/cl-admin.min.css" />
	<script src="<?= base_url ?>assets/js/all.js" crossorigin="anonymous"></script>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
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
									<a class="navbar-brand text-white"><?= $_SESSION['identity']->nombre ?> <?= $_SESSION['identity']->apellido ?></a>
									<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
										<span class="navbar-toggler-icon"></span>
									</button>

									<!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
										 <ul class="navbar-nav mr-auto">
											<// ?php $doctores = Utils::showDoctores(); ?>
  											<// ?php while ($doc = $doctores->fetch_object()) : ?>
      										<li class="nav-item active">
        										<a class="nav-link text-white" href="<// ?= base_url ?>doctor/ver&id=< // ?= $doc->id ?>">< // ?= $doc->nombreyApellido ?> <span class="sr-only">(current)</span></a>
      										</li>
	  										<// ?php endwhile; ?>
										</ul>
										
									</div> -->
								</nav>

							</div>
						</div>
					</div>
				</div>
			</div>

		<?php endif; ?>