<?php if(isset($_SESSION['identity'])): ?>
<div class="col-10">
<div class="row">
<div class="col-12">
<h1 class="text-center my-4">Continuar con el pago</h1>
</div>

<div class="offset-2 mt-3 col-8">

<form action="" method="POST">
  <div class="form-group">
    <label for="formGroupExampleInput">Example label</label>
    <input type="text" class="form-control" id="" placeholder="Example input">
  </div>
  <div class="form-group">
    <label for="">Another label</label>
    <input type="text" class="form-control" id="" placeholder="Another input">
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