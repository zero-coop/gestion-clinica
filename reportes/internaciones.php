<?php

require __DIR__ . '/../models/pedido.php';
require __DIR__ . '/../models/obrasociales.php';
require __DIR__ . '/../config/db.php';

$obrasocial = new ObraSocial();

$obj = new Pedido();
$mostrar = $obj->getInternaciones();

$html = "
<body>
<h1 style='text-align:center; font-family:Helvetica; color:green;'>Clinica</h1>
<h2 style='text-align:center; font-family:Helvetica; color:grey;'>Pacientes</h2>
<table style='' width='100%'>
<tr>
<th style='border-bottom: 1px solid #ddd; padding: 10px; text-align: left; background-color: #4CAF50; color: white;'>NºAtencion</th>
<th style='border-bottom: 1px solid #ddd; padding: 10px; text-align: left; background-color: #4CAF50; color: white;'>Medico</th>
<th style='border-bottom: 1px solid #ddd; padding: 10px; text-align: left; background-color: #4CAF50; color: white;'>Paciente</th>
<th style='border-bottom: 1px solid #ddd; padding: 10px; text-align: left; background-color: #4CAF50; color: white;'>Fecha Inicio</th>
</tr>";

while ($mos = $mostrar->fetch_assoc()) {

    $html .= "<tr style='hover {background-color: #f5f5f5;};nth-child(even) {background-color: #f2f2f2;}'>
                <td style='border-bottom: 1px solid #ddd;  padding: 10px;text-align: left;'>" . $mos['id_orden_atencion'] . "</td>
                <td style='border-bottom: 1px solid #ddd;  padding: 10px;text-align: left;'>" . $mos['medicoapellido'] . ', ' . $mos['mediconombre'] . "</td>
                <td style='border-bottom: 1px solid #ddd;  padding: 10px;text-align: left;'>" . $mos['pacienteapellido'] . ', ' . $mos['pacientenombre'] . "</td>
                <td style='border-bottom: 1px solid #ddd;  padding: 10px;text-align: left;'>" . $mos['fecha'] . "</td>
            </tr>";
}
$html .= "</table>";



// Require composer autoload
require_once __DIR__ . '/../vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();
$mpdf->SetTitle('Reporte de Pacientes Internados');
// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output('reporte_pacientes_internados.pdf', 'I');
