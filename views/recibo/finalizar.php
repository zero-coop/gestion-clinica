<?php if(isset($_SESSION['identity'])): ?>
<div class="col-10">
<div class="row">
<div class="col-12">
<h1 class="text-center mt-5">Continuar con el pago</h1>
</div>

<div class="offset-2 mt-3 col-8">

<form>
  <div class="form-group">
    <label for="formGroupExampleInput">Precio</label>
    <input type="text" class="form-control" id="formGroupExampleInput" value="<?= $precio; ?>">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Metodo</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" value="<?= $metodo; ?>">
  </div>
</form>


<?php else: ?>
<div class="col-10">
	
	<div class="alert alert-warning m-5" role="alert">
		<strong>Necesitas ser andministrador.</strong> Inicia sesion aqui <a href="<?=base_url?>"></a>
	</div>
</div>


<?php endif; ?>