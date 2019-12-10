<?php 
require_once 'conexion.php';
?>


  <div class="container-fluid">
  <div class="row">
      
  <div class="col-12">

  <table class="table table-bordered mt-4">
  <thead>
    <tr>
    <th>ID</th>
    <th>APELLIDO Y NOMBRE</th>
    <th>DNI</th>
    <th>EDAD</th>
    <th>SEXO</th>
    <th>OBRA SOCIAL</th>
    <th>FECHA DE NACIMIENTO</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php while($mos=$mostrar->fetch_object()) :?>
<tr>
<th scope="row"><?=$mos->id_paciente?></th>
<td><?php echo "$mos->apellido ". " " ." $mos->nombre"?></td>
<td><?=$mos->dni?></td>
<td><?=$mos->sexo?></td>
<td><?=$mos->telefono?></td>
<td><?=$mos->direccion?></td>
<td><?=$mos->fecha_nacimiento?></td>
</tr>
<?php endwhile; ?>
  </tbody>
</table>
  </div>
  </div>
  </div>
   
  </body>