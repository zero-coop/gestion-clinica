<div class="col-10">

<div class="row">
    
    <div class="col-12">
<div class="alert alert-success mt-5 text-center" role="alert">
  <strong>El pago se guardo correctamente!</strong>
</div>
    </div>
    <div class="col-12 text-center">
    <a href=""><button class="btn btn-danger">Imprimir factura PDF</button></a>
    <a href="http://localhost/gestion-clinica/recibo/registro"><button class="btn btn-info">Ver registro de pagos</button></a>
    <a href="http://localhost/gestion-clinica/"><button class="btn btn-primary">Inicio</button></a>
    </div>

    <div class="offset-1 mt-3 col-10">
    <div class="card my-5">
  <div class="card-body">
    <div class="row">
<?php while($to=$recibo_terminado->fetch_object()):?>
    <div class="col-3 text-center">
    <img class="" style="" src="http://localhost/gestion-clinica/assets/img/png.png" width="80%" alt="">
    
    </div>
    <div class="col-7">
    <h1 class="text-center mt-5">RECIBO</h1>
    </div>
    <div class="offset-1 col-4">
    <h4 class="">SENYP</h4><p></p>
    <h4 class="">Servicio de Neonatologia y Pediatria</h4><p></p>
    <h4 class="">Urquiza 150, Salta Capital</h4>
    <h4 class="">387 431-5222</h4>
    </div>  
    <div class="offset-2 col-2">
    <h4 class="text-primary">N° DE RECIBO:</h4><p></p>
    <h4 class="text-primary">FECHA Y HORA:</h4><p></p>
    <h4 class="text-primary">N° DE ORDEN:</h4><p></p>
    </div>  
    <div class="offset-1 col-2">
    <h4 class="text-dark"><?=$to->id?></h4><p></p>
    <h4 class="text-dark"><?=$to->fecha?></h4><p></p>
    <h4 class="text-dark"><?=$to->id_orden_atencion?></h4><p></p>
    </div>

    <div class="offset-1 col-10">
    <table class="table my-5">
  <thead>
    <tr>
      <th>DNI</th>
      <th>APELLIDO Y NOMBRE</th>
      <th>SERVICIO</th>
      <th>PRECIO</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?=$to->dni?></th>
      <td><?=$to->apellido . " ". $to->nombre?></td>
      <td><?=$to->descripcion?></td>
      <td><?=$to->monto?></td>
    </tr>
  </tbody>
</table>
    </div>

    <div class="offset-8 col-4">

    <p class="text-primary">TOTAL :</p> $<?=$to->monto?>
    <p class="mt-5 text-primary">*El pago se realizo con <?=$to->metodo?></p>
    </div>




<?php endwhile;?>

 
 
    </div>
  </div>
</div>
    

    </div>

</div>
</div>