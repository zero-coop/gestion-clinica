<?php if(isset($_SESSION['identity'])): ?>
<div class="col-10">

<?php if (isset($_SESSION['identity'])): ?>
	<h1 class="my-4 text-center">Nueva Atencion</h1>
	<p>
		<a href="<?= base_url ?>carrito/index"><p class="text-center">Ver el paciente</p></a>
	</p>
	<br/>
	
	<h3 class="mb-5">Detalles:</h3>
	<form action="<?=base_url.'pedido/add'?>" method="POST">
	<div class="form-group">
		<label for="provincia">Obra social</label>
		<input type="text" class="form-control" name="obra_social" required />
	</div>
		
	<div class="form-group">
		<label for="ciudad">Precio</label>
		<input type="number" class="form-control" name="precio" required />
	</div>
		
	<div class="form-group">
		<button type="submit" class="btn btn-success mt-3" value="Confirmar">Confirmar</button>
	</div>
	</form>
		
<?php else: ?>
	<h1>Necesitas estar identificado</h1>
	<p>Necesitas estar logueado en la web para poder realizar la atención.</p>
<?php endif; ?>


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
