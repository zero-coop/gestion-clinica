
<?php if(isset($_SESSION['identity'])): ?>
<div class="col-10 mt-3">
<div class="row">
	<div class="col-12">
<h1 class="text-center my-5">Nuestros pacientes</h1>
	</div>


	

<?php while($pacient = $pacientes->fetch_object()): ?>


	<!-- <a href="<?=base_url?>paciente/ver&id=<?=$pacient->id?>">
			<?php if($pacient->imagen != null): ?>
				<img src="<?=base_url?>uploads/images/<?=$pacient->imagen?>" width="80px"/>
			<?php else: ?>
				<img src="<?=base_url?>assets/img/doctora.png" width=""/>
			</a>
			<?php endif; ?> -->



			<div class="offset-1 col-7 my-3">
	 
	<a href="<?=base_url?>paciente/ver&id=<?=$pacient->id?>">
			<h4><?=$pacient->nombreyApellido?></h4>
			</a>
			</div>
			<div class="col-4">
	 
      
		<a href="<?=base_url?>carrito/add&id=<?=$pacient->id?>" class="button">
		<button type="button" class="btn btn-primary">Terminado</button></a>
			</div>
	

<?php endwhile; ?>
</div>
</div>

</div>
</div>
<?php endif; ?>