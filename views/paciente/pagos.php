<div class="col-10">

<div class="row">
    
    <div class="col-12 text-center my-5"><h1 class="display-4">Registro de pagos</h1></div>




<?php while($to=$todos->fetch_object()): ?>

    <div class="offset-1 col-10 mt-2">

    <div class="card text-white bg-success mb-3 d-inline-block" style="min-width: 100%;">
  <div class="card-header bg-while text-dark"><?="Fecha: " . $to->fecha?></div>
  <div class="card-header bg-success"><?="Metodo: " . $to->metodo ." " . "$". $to->monto?></div> 
  <div class="card-body">
    <h4 class="card-title"><?=$to->descripcion?></h4>
    <p class="card-text"><?= "Medico: " . $to->apellido . " " . $to->nombre ?></p>
  </div>
</div>
    </div>





<?php endwhile;?>



</div>





</div>