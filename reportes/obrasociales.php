<?php 

require __DIR__ . '/../models/obrasociales.php';
require __DIR__ . '/../config/db.php';

$obrasocial = new ObraSocial();
$obrasociales = $obrasocial->getAll();

$html = "
<body>
<h1 style='text-align:center; font-family:Helvetica; color:green;'>Clinica</h1>
<h2 style='text-align:center; font-family:Helvetica; color:grey;'>Obras Sociales</h2>
<table style='' width='100%'>
<tr>
<th style='border-bottom: 1px solid #ddd; padding: 10px; text-align: left; background-color: #4CAF50; color: white;'>ID</th>
<th style='border-bottom: 1px solid #ddd; padding: 10px; text-align: left; background-color: #4CAF50; color: white;'>NOMBRE</th>
<th style='border-bottom: 1px solid #ddd; padding: 10px; text-align: left; background-color: #4CAF50; color: white;'>CUIT</th>
<th style='border-bottom: 1px solid #ddd; padding: 10px; text-align: left; background-color: #4CAF50; color: white;'>CORREO</th>
<th style='border-bottom: 1px solid #ddd; padding: 10px; text-align: left; background-color: #4CAF50; color: white;'>TELEFONO</th>
<th style='border-bottom: 1px solid #ddd; padding: 10px; text-align: left; background-color: #4CAF50; color: white;'>DIRECCION</th>
</tr>";

while($mos = $obrasociales->fetch_assoc()){
 
    $html .= "<tr style='hover {background-color: #f5f5f5;};nth-child(even) {background-color: #f2f2f2;}'>
                <td style='border-bottom: 1px solid #ddd;  padding: 10px;text-align: left;'>".$mos['id_obrasociales']."</td>
                <td style='border-bottom: 1px solid #ddd;  padding: 10px;text-align: left;'>".$mos['nombre']."</td>
                <td style='border-bottom: 1px solid #ddd;  padding: 10px;text-align: left;'>".$mos['cuit']."</td>
                <td style='border-bottom: 1px solid #ddd;  padding: 10px;text-align: left;'>".$mos['correo']."</td>
                <td style='border-bottom: 1px solid #ddd;  padding: 10px;text-align: left;'>".$mos['telefono']."</td>
                <td style='border-bottom: 1px solid #ddd;  padding: 10px;text-align: left;'>".$mos['direccion']."</td>
    
            </tr>";

}
$html .= "</table>";



// Require composer autoload
require_once __DIR__ . '/../vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();
$mpdf->SetTitle('Reporte de Obras Sociales');
// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output('reporte_obras_sociales.pdf', 'I');
