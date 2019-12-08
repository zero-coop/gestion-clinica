<div class="col-10">
<div class="row">
    <!-- Titulo -->
<div class="col-12"><h2 class="text-center display-4 my-4">Historia Clinica</h2></div>


<!-- Contenido -->
<?php while ($his = $historia->fetch_object()) : ?>	

<div class="offset-1 col-10">

    <div class="card text-dark bg-primary d-inline-block my-3" style="min-width: 100%;">
  <div class="card-header"><?= $his->fecha; ?></div>
  <div class="card-body">
    <h4 class="card-title text-white"><?= $his->descripcion; ?></h4>
    <p class="card-text text-white">Doctor: <?= $his->medicoapellido . " " . $his->mediconombre; ?></p>
  </div>
</div>
</div>

<?php endwhile; ?>







</div>
</div>