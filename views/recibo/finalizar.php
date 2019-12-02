<?php if(isset($_SESSION['identity'])): ?>
<div class="col-10">
<div class="row">
<div class="col-12">
<h1 class="text-center mt-5">Finalizar pago</h1>
</div>

<div class="offset-2 mt-3 col-8">

<form>
  <div class="form-group">
  
    <input type="text" class="form-control" id="formGroupExampleInput"  value="<?= $precio; ?>">
  </div>
  <div class="form-group">
 
    <input type="text" class="form-control" id="formGroupExampleInput2"  value="<?= $metodo; ?>">
  </div>
<?php while ($rec =$recargos->fetch_object()) : ?>
  <div class="form-group">
    <label for="">Con <?=$rec->metodo ?></label>
    <input type="text" class="form-control" name="id_orden" value="<?=$rec->recargo ?>">
  </div>
  <?php endwhile; ?>
</form>



<?php else: ?>
<div class="col-10">
	
	<div class="alert alert-warning m-5" role="alert">
		<strong>Necesitas ser andministrador.</strong> Inicia sesion aqui <a href="<?=base_url?>"></a>
	</div>
</div>


<?php endif; ?>