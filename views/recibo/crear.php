<?php if(isset($_SESSION['identity'])): ?>
<div class="col-10">
<div class="row">
<div class="col-12">
<h1 class="text-center mt-5">Continuar con el pago</h1>
</div>

<div class="offset-2 mt-3 col-8">

<form action="" method="POST">
  <?php while ($rec =$devolver->fetch_object()) : ?>
  <div class="form-group">
    <input type="text" class="form-control" id="" value="<?=$rec->id_orden_atencion ?>" placeholder="Example input" style="visibility:hidden">
  </div>
  <?php endwhile; ?>
  <div class="form-group">
						<label for="metodos">Metodo de Pago :</label>
						<?php $metodos = Utils::showMetodosPagos(); ?>
						<select class="form-control" name="id_metodo">
							<?php while ($met = $metodos->fetch_object()) : ?>
								<option value="<?= $met->id_metodo_pago ?>">
									<?= $met->metodo ?>
								</option>
						</select>
							<?php endwhile; ?>
					</div>

  <div class="form-group">
    <label for="">Precio Total</label>
    <input type="text" class="form-control" id="" placeholder="">
  </div>
</form>



</div>

<?php else: ?>
<div class="col-10">
	
	<div class="alert alert-warning m-5" role="alert">
		<strong>Necesitas ser andministrador.</strong> Inicia sesion aqui <a href="<?=base_url?>"></a>
	</div>
</div>


<?php endif; ?>