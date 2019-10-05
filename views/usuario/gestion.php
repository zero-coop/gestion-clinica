<?php if(isset($_SESSION['identity'])): ?>
<div class="col-10">
<div class="row">

<div class="col-12">
<h1 class="text-center my-4">Gestión Usuarios</h1>

<a href="<?=base_url?>usuario/registro">
<button type="button" class="btn btn-success">Agregar usuario</button>
</a>
</div>
<div class="col-12">
<table class="table mt-4 table-bordered">
<thead class="thead-light">
	<tr>
		<th>ID</th>
		<th>NOMBRE</th>
		<th>APELLIDO</th>
		<th>EMAIL</th>
		<th>ACCIONES</th>
	</tr>
	</thead>
	<tbody>
	<?php while($usuario = $usuarios->fetch_object()): ?>
		<tr>
			<td scope="row"><?=$usuario->id;?></td>
			<td><?=$usuario->nombre;?></td>
			<td><?=$usuario->apellidos;?></td>
			<td><?=$usuario->email;?></td>
			<td>
				<a href="<?=base_url?>usuario/eliminar&id=<?=$usuario->id?>"><button type="button" class="btn btn-danger">Eliminar</button></a>
			</td>
		</tr>
	<?php endwhile; ?>
	</tbody>
</table>
</div>


</div>
</div>
<?php else: ?>
	


<?php endif; ?>