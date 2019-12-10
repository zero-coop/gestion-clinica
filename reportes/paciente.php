<?php 
require_once 'conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pacientes</title>
</head>
<body>

<table border="1px" width="80%" text-aling="center">
<tr>
<th>ID</th>
<th>APELLIDO Y NOMBRE</th>
<th>DNI</th>
<th>EDAD</th>
<th>SEXO</th>
<th>OBRA SOCIAL</th>
</tr>
<?php while($mos=$mostrar->fetch_object()) :?>
<tr>
<td value="<?php echo $mos->id_paciente?>"></td>
<td><?=$mos->apellido . " " . $mos->nombre?></td>
<td><?=$mos->dni?></td>
<td><?=$mos->sexo?></td>
<td><?=$mos->telefono?></td>
<td><?=$mos->direccion?></td>
</tr>
<?php endwhile; ?>

</table>
    
</body>
</html>
