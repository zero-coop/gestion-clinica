<?php 

require __DIR__ . '/../models/paciente.php';
require __DIR__ . '/../models/obrasociales.php';
require __DIR__ . '/../config/db.php';

$obrasocial = new ObraSocial();

$obj = new Paciente();
$mostrar = $obj->getAll();

$html = "
<body>
<h1 style='text-align:center; font-family:Helvetica; color:green;'>Clinica</h1>
<h2 style='text-align:center; font-family:Helvetica; color:grey;'>Pacientes</h2>
<table style='' width='100%'>
<tr>
<th style='border-bottom: 1px solid #ddd; padding: 10px; text-align: left; background-color: #4CAF50; color: white;'>ID</th>
<th style='border-bottom: 1px solid #ddd; padding: 10px; text-align: left; background-color: #4CAF50; color: white;'>APELLIDO Y NOMBRE</th>
<th style='border-bottom: 1px solid #ddd; padding: 10px; text-align: left; background-color: #4CAF50; color: white;'>DNI</th>
<th style='border-bottom: 1px solid #ddd; padding: 10px; text-align: left; background-color: #4CAF50; color: white;'>EDAD</th>
<th style='border-bottom: 1px solid #ddd; padding: 10px; text-align: left; background-color: #4CAF50; color: white;'>SEXO</th>
<th style='border-bottom: 1px solid #ddd; padding: 10px; text-align: left; background-color: #4CAF50; color: white;'>OBRA SOCIAL</th>
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


    $html .= "<tr style='hover {background-color: #f5f5f5;};nth-child(even) {background-color: #f2f2f2;}'>
                <td style='border-bottom: 1px solid #ddd;  padding: 10px;text-align: left;'>".$mos['id_paciente']."</td>
                <td style='border-bottom: 1px solid #ddd;  padding: 10px;text-align: left;'>".$mos['apellido']. ', ' . $mos['nombre']."</td>
                <td style='border-bottom: 1px solid #ddd;  padding: 10px;text-align: left;'>".$mos['dni']."</td>
                <td style='border-bottom: 1px solid #ddd;  padding: 10px;text-align: left;'>".$edad."</td>
                <td style='border-bottom: 1px solid #ddd;  padding: 10px;text-align: left;'>".$mos['sexo']."</td>
                <td style='border-bottom: 1px solid #ddd;  padding: 10px;text-align: left;'>".$obrita."</td>
            </tr>";

}
$html .= "</table>";



// Require composer autoload
require_once __DIR__ . '/../vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();
$mpdf->SetTitle('Reporte de Pacientes');
// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
//$mpdf->Output('reporte_pacientes.pdf', 'I');
