<?php if(isset($_SESSION['identity'])): ?>
<div class="col-10">
<div class="row">
<div class="offset-2 col-10">
<h1 class="mt-5 text-success">Finalizar pago</h1>
</div>
<div class="offset-1 col-10">
<div class="row">
  

<?php while ($to =$terminado->fetch_object()) : ?>
  <div class="col-12">
  <h2 class="text-center mt-3">Establecimiento</h2>
  <h2 class="text-center mt-3">Clinica</h2>
  <h3 class="text-center text-primary mt-5">Obra Social</h3>
  <h4 class="text-center mt-1"><?= $to->obra?></h4>
  </div>
  <div class="offset-1 col-3">
  <h4 class="text-primary">Numero de orden:</h4><h4><?=$to->id_orden_atencion?></h4>
  </div>
  <div class="offset-3 col-5">
  <h4 class="text-primary">Apellido y Nombre del paciente: </h4><h4><?=$to->pacienteapellido . " " . $to->pacientenombre?></h4>
  </div>
  <div class="offset-1 col-3">
  <h4 class="text-primary">Fecha:</h4><h4><?=$to->fecha?></h4>
  </div>
  <div class="offset-3 col-5">
  <h4 class="text-primary">Dni: </h4><h4><?=$to->dni?></h4>
  </div>
  <div class="offset-1 col-5">
  <h4 class="text-primary">Apellido y Nombre del Doctor: </h4><h4><?=$to->medicoapellido . " " . $to->mediconombre?></h4>
  </div>
  <div class="offset-1 col-3">
  <h4 class="text-primary">Especialidad </h4><h4><?=$to->especialidad?></h4>
  </div>




  <?php endwhile; ?>



<div class="offset-6 mb-5 col-5">

<form action="http://localhost/gestion-clinica/recibo/terminar" method="POST">
  <div class="form-group">
  
    <input type="text" class="form-control" style="visibility:hidden" name="id" value="<?= $id_orden; ?>">
  </div>
  <div class="form-group">
 
    <input type="text" class="form-control" style="visibility:hidden" name="metodo" value="<?= $metodo; ?>">
  </div>
<?php while ($rec =$recargos->fetch_object()) : ?>
    <h4 class="text-primary">Con <?=$rec->metodo ?> el precio total es :</h4>
    <input type="text" class="form-control" name="precio" value="<?=$precio+$precio*$rec->recargo/100; ?>" name="id_orden">
  <?php endwhile; ?>
    <button class="btn btn-success mt-3">Terminar Pago</button>
</form>

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