<?php if(isset($_SESSION['identity'])): ?>
<div class="col-10">
<div class="row">
<div class="offset-1 mb-2 col-10">
<h1 class="my-5 text-success">Finalizar pago</h1>
    <button class="btn btn-info" onclick="mostrarTotal()">Calcular Precio</button>
</div>
<div class="offset-1 col-10">
<div class="card">
  <div class="card-body">
<div class="row">
  

<?php while ($to =$terminado->fetch_object()) : ?>


  <div class="col-12">
  <h2 class="text-center card-title mt-3">Establecimiento</h2>
  <h2 class="text-center card-subtitle mb-2 text-muted mt-3">Clinica</h2>
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
  <h4 class="text-primary">Fecha y hora:</h4><h4><?=$to->fecha?></h4>
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
     <input type="text" class="form-control" id="precio" name="metodo" style="visibility:hidden" value="<?php echo $precio; ?>">
  </div>
     <label for="">El precio es $<?php echo $precio?></label> 
<?php while ($obra =$desObra->fetch_object()) : ?>
  <div class="form-group">
 
    <input type="text" class="form-control" name="metodo" style="visibility:hidden" id="descuentoobra" value="<?= $obra->descuento; ?>">
    <label for="">*Descuento con obra social del <?= $obra->descuento; ?> %</label>
  </div>

  <?php endwhile; ?>
<?php while ($rec =$recargos->fetch_object()) : ?>
    <label for="">*Con <?=$rec->metodo ?> el recargo es del <?=$rec->recargo?> % </label>
    <input type="text" class="form-control" name="precio" id="recargo" style="visibility:hidden" value="<?=$rec->recargo?>" name="">
  <?php endwhile; ?>

    <label class="text-info" for="">Precio Total</label>
    <input type="text" class="form-control" id="total" name="precio" value="" name="precio">
    
  <div class="form-group">
 
    <input type="text" class="form-control"  name="metodo" style="visibility:hidden" value="<?= $metodo; ?>">
  </div>
    <button class="btn btn-success my-2">Terminar Pago</button>
</form>

</div>
</div>
</div>
</div>
</div>

<script>

var obra=0;
var precio_total=0;
var total=0;
var recargo=0;
var descuento_obra=0;
var recargo=0;
var precio=0;
function mostrarTotal(){

var descuento_obra=document.getElementById("descuentoobra").value;
var recargo=document.getElementById("recargo").value;
var precio=document.getElementById("precio").value;


obra=(precio*descuento_obra)/100;
total=precio-obra;
recargo=(total*recargo)/100;
precio_total=total+recargo;

document.getElementById('total').value=precio_total;

}



</script>

<?php else: ?>
<div class="col-10">
	
	<div class="alert alert-warning m-5" role="alert">
		<strong>Necesitas ser andministrador.</strong> Inicia sesion aqui <a href="<?=base_url?>"></a>
	</div>
</div>


<?php endif; ?>