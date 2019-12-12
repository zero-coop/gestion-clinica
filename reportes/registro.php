<?php 

require __DIR__ . '/../models/recibo.php';
require __DIR__ . '/../config/db.php';

$obj = new Recibo();
$tabla = $obj->getInicio();

$html = "
<body>
<img style='text-align:left' src='http://localhost/gestion-clinica/assets/img/png.jpg' width='10%'>
<h1 style='text-align:center; font-family:Helvetica; color:green;'>Clinica</h1>
<h2 style='text-align:center; font-family:Helvetica; color:grey;'>Registro de Pagos</h2>
<table style='' width='100%'>
<tr>
<th style='border-bottom: 1px solid #ddd; padding: 10px; text-align: left; background-color: #4CAF50; color: white;'>N° Recibo</th>
<th style='border-bottom: 1px solid #ddd; padding: 10px; text-align: left; background-color: #4CAF50; color: white;'>N° Orden</th>
<th style='border-bottom: 1px solid #ddd; padding: 10px; text-align: left; background-color: #4CAF50; color: white;'>Paciente</th>
<th style='border-bottom: 1px solid #ddd; padding: 10px; text-align: left; background-color: #4CAF50; color: white;'>Medico</th>
<th style='border-bottom: 1px solid #ddd; padding: 10px; text-align: left; background-color: #4CAF50; color: white;'>Descripcion</th>
<th style='border-bottom: 1px solid #ddd; padding: 10px; text-align: left; background-color: #4CAF50; color: white;'>Pago</th>
<th style='border-bottom: 1px solid #ddd; padding: 10px; text-align: left; background-color: #4CAF50; color: white;'>Total</th>
<th style='border-bottom: 1px solid #ddd; padding: 10px; text-align: left; background-color: #4CAF50; color: white;'>Fecha</th>
</tr>";                                                                                                              


while($mos = $tabla->fetch_assoc()){
 
    $html .= "<tr style='hover {background-color: #f5f5f5;};nth-child(even) {background-color: #f2f2f2;}'>
                <td style='border-bottom: 1px solid #ddd;  padding: 10px;text-align: left;'>".$mos['recibo']."</td>
                <td style='border-bottom: 1px solid #ddd;  padding: 10px;text-align: left;'>".$mos['id_orden_atencion']."</td>
                <td style='border-bottom: 1px solid #ddd;  padding: 10px;text-align: left;'>".$mos['pacienteapellido']. ', ' .$mos['pacientenombre']."</td>
                <td style='border-bottom: 1px solid #ddd;  padding: 10px;text-align: left;'>".$mos['medicoapellido'].', ' .$mos['mediconombre']."</td>
                <td style='border-bottom: 1px solid #ddd;  padding: 10px;text-align: left;'>".$mos['descripcion']."</td>
                <td style='border-bottom: 1px solid #ddd;  padding: 10px;text-align: left;'>".$mos['metodo']."</td>
                <td style='border-bottom: 1px solid #ddd;  padding: 10px;text-align: left;'>".$mos['monto']."</td>
                <td style='border-bottom: 1px solid #ddd;  padding: 10px;text-align: left;'>".$mos['fecha']."</td>
    
            </tr>";

}
$html .= "</table>";



// Require composer autoload
require_once __DIR__ . '/../vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
$mpdf->SetTitle('Registro de Pagos');
// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output('registro_pagos.pdf', 'I');
