<div class="col-10">
<div class="row">

<div class="col-12 text-center">
<h1 class="display-4 my-5">Observaciones</h1>
</div>

<div class="offset-1 col-9">


<form action="http://localhost/gestion-clinica/pedido/cargar" method="POST">
<input type="number" name="id" style="visibility:hidden" value="<?php echo $id; ?>">

<?php while($obs=$todo->fetch_object()): ?>
  <div class="form-group">
    <label>Observacion</label>
    <input type="text" class="form-control" name="observacion" value="<?php echo $obs->descripcion ?>" id="formGroupExampleInput" placeholder="Example input">

  </div>
  <div class="form-group">
    <label>Medicamento</label>
    <input type="text" class="form-control" name="medicamento" id="formGroupExampleInput" value="<?php echo $obs->medicamento ?>" placeholder="Example input">
  </div>
  <button class="btn btn-primary my-5">Guardar</button>

</form>
<?php endwhile; ?>



</div>

</div>

</div>