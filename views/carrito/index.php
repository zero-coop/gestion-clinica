<?php if(isset($_SESSION['identity'])): ?>
<div class="col-10">
<div class="row">
<div class="col-12">
<h1 class="text-center my-4">Continuar con la atencion</h1>

<?php if(isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1): ?>
<table class="table mt-4 table-bordered">
<thead class="thead-light">
	<tr>
		<th>Nombre y Apellido</th>
		<th>Eliminar</th>
	</tr>
</thead>
	<?php 
		foreach($carrito as $indice => $elemento): 
		$paciente = $elemento['paciente'];
	?>
<tbody>	
	<tr>
		<td scope="row">
			<a href="<?= base_url ?>paciente/ver&id=<?=$paciente->id?>"><?=$paciente->nombre . " " . $paciente->apellido?></a>
		</td>
		<td>
			<a href="<?=base_url?>carrito/delete&index=<?=$indice?>" class="button button-carrito button-red">Quitar paciente</a>
		</td>
	</tr>
	
<tbody>	
	<?php endforeach; ?>
</table>
			</div>
<div class="col-3 my-4">
	<a href="<?=base_url?>carrito/delete_all">
<button type="button" class="btn btn-danger">Vaciar</button>
	</a>
	<?php $stats = Utils::statsCarrito(); ?>
</div>
<div class="offset-4 col-4 my-4">
	<a href="<?=base_url?>pedido/hacer">
	<button type="button" class="btn btn-success mt-3">
	Continuar
	</button>
	</a>
</div>


<?php else: ?>
<div class="alert alert-info" role="alert">
	<strong>Está vacio, añade algun paciente</strong>
</div>


<?php endif; ?>
</div>
</div>
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