<?php if(isset($_SESSION['identity'])): ?>
<div class="col-10">

<h1 class="text-center my-4">Gestionar Doctores</h1>
<a href="<?=base_url?>doctor/crear">
<button class="btn btn-success">
	Nuevo doctor
</button>
</a>
<table class="table mt-4 table-bordered">
<thead class="thead-light">
	<tr>
		<th>ID</th>
		<th>NOMBRE Y APELLIDO</th>
		<th>ESPECIALIDAD</th>
		<th>TELEFONO</th>
		<th>DIRECCION</th>
		<th>CIUDAD</th>
		<th>ACCIONES</th>
	</tr>
	</thead>
	<?php while($doc = $doctores->fetch_object()): ?>
	<tbody>
		<tr>
			<td scope="row"><?=$doc->id;?></td>
			<td><?=$doc->nombreyApellido;?></td>
			<td><strong><?=$doc->especialidad;?></strong></td>
			<td><?=$doc->telefono;?></td>
			<td><?=$doc->direccion;?></td>
			<td><?=$doc->ciudad;?></td>
			<td>
			<a href="<?=base_url?>doctor/editar&id=<?=$doc->id?>">
			<button type="button" name="" id="" class="btn btn-warning" btn-lg btn-block">Editar</button>
			</a>
			<a href="<?=base_url?>doctor/eliminar&id=<?=$doc->id?>">
			<button type="button" name="" id="" class="btn btn-danger" btn-lg btn-block">Eliminar</button>
			</a>
			</td>
		</tr>
	</tbody>
	<?php endwhile; ?>
</table>

</div>
</div>
</div>

<?php else: ?>
<div class="col-10">
	
	<div class="alert alert-warning m-5" role="alert">
		<strong>Necesitas ser andministrador.</strong> Inicia sesion aqui <a href="<?=base_url?>"></a>
	</div>
</div>

<?php endif;?>