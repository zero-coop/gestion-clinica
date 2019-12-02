<?php if(isset($_SESSION['identity'])): ?>
<div class="col-10">
<div class="row">
<div class="col-12">
<h1 class="text-center mt-5">Continuar con el pago</h1>
</div>

<div class="offset-2 mt-3 col-8">

<form action="http://localhost/gestion-clinica/recibo/continuar" method="POST">
  <?php while ($rec =$devolver->fetch_object()) : ?>
  <div class="form-group">
    <label for="">Numero de pedido</label>
    <input type="text" class="form-control" name="id_orden" value="<?=$rec->id_orden_atencion ?>" >
  </div>
  <?php endwhile; ?>

  <div class="form-group">
    <label for="">Precio Total</label>
    <input type="text" name="precio" class="form-control" id="precio_pedido" placeholder="">
  </div>
  <div class="form-group">
		<label for="metodos">Metodo de Pago :</label>
		<?php $metodospagos = Utils::showMetodosPagos(); ?>
		<select class="form-control" name="id_metodo">
		<?php while ($metodo = $metodospagos->fetch_object()) : ?>
	    <option value="<?= $metodo->id_metodo_pago ?>">
		<?= $metodo->metodo ?>
		</option>
		<?php endwhile; ?>
		</select>
		</div>

  <div class="form-group mt-5 text-right">
    <button type="submit" class="btn btn-success">Continuar</button>
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