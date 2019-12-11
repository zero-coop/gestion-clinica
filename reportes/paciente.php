<?php 

require __DIR__ . '/../models/paciente.php';
require __DIR__ . '/../models/obrasociales.php';
require __DIR__ . '/../config/db.php';

$obrasocial = new ObraSocial();

$obj = new Paciente();
$mostrar = $obj->getPacientes();

$html = "
<body>

<table>
<tr>
<th>ID</th>
<th>APELLIDO Y NOMBRE</th>
<th>DNI</th>
<th>EDAD</th>
<th>SEXO</th>
<th>OBRA SOCIAL</th>
</tr>";

while($mos = $mostrar->fetch_assoc()){
    $cumpleanos = new DateTime($mos['fecha_nacimiento']);
	$hoy = new DateTime();
	$annos = $hoy->diff($cumpleanos);
    $edad = $annos->y;;

    $obra = $obrasocial->getObraSocial($mos['id_paciente']);
	if ($obra->id_obrasociales != 0) {
        $numero_socio = ObraSocial::getNumeroObraSocial($mos['id_paciente']);
        $obrita =  $obra->nombre . " | Numero: " . $numero_socio->numero_socio;
	} else {
	    $obrita = $obra->nombre;
	}


    $html .= "<tr>
                <td>".$mos['id_paciente']."</td>
                <td>".$mos['apellido']."</td>
                <td>".$mos['dni']."</td>
                <td>".$edad."</td>
                <td>".$mos['sexo']."</td>
                <td>".$obrita."</td>
            </tr>";

}
$html .= "</table>";



// Require composer autoload
require_once __DIR__ . '/../vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();

// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();


?>