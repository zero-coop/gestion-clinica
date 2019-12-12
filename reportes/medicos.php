<?php 

require __DIR__ . '/../models/paciente.php';
require __DIR__ . '/../models/medico.php';
require __DIR__ . '/../config/db.php';

$obj = new Medico();
$tabla = $obj->getAll();

$html = "
<body>
<img style='text-align:left' src='http://localhost/gestion-clinica/assets/img/png.jpg' width='10%'>
<h1 style='text-align:center; font-family:Helvetica; color:green;'>Clinica</h1>
<h2 style='text-align:center; font-family:Helvetica; color:grey;'>Medicos</h2>
<table style='' width='100%'>
<tr>
<th style='border-bottom: 1px solid #ddd; padding: 10px; text-align: left; background-color: #4CAF50; color: white;'>ID</th>
<th style='border-bottom: 1px solid #ddd; padding: 10px; text-align: left; background-color: #4CAF50; color: white;'>NOMBRE y APELLIDO</th>
<th style='border-bottom: 1px solid #ddd; padding: 10px; text-align: left; background-color: #4CAF50; color: white;'>DNI</th>
<th style='border-bottom: 1px solid #ddd; padding: 10px; text-align: left; background-color: #4CAF50; color: white;'>ESPECIALIDAD</th>
<th style='border-bottom: 1px solid #ddd; padding: 10px; text-align: left; background-color: #4CAF50; color: white;'>MATRICULA</th>
<th style='border-bottom: 1px solid #ddd; padding: 10px; text-align: left; background-color: #4CAF50; color: white;'>DOMICILIO</th>
<th style='border-bottom: 1px solid #ddd; padding: 10px; text-align: left; background-color: #4CAF50; color: white;'>CELULAR</th>
</tr>";

while($mos = $tabla->fetch_assoc()){
 
    $html .= "<tr style='hover {background-color: #f5f5f5;};nth-child(even) {background-color: #f2f2f2;}'>
                <td style='border-bottom: 1px solid #ddd;  padding: 10px;text-align: left;'>".$mos['id_medico']."</td>
                <td style='border-bottom: 1px solid #ddd;  padding: 10px;text-align: left;'>".$mos['apellido']. ', ' .$mos['nombre']."</td>
                <td style='border-bottom: 1px solid #ddd;  padding: 10px;text-align: left;'>".$mos['dni']."</td>
                <td style='border-bottom: 1px solid #ddd;  padding: 10px;text-align: left;'>".$mos['especialidad']."</td>
                <td style='border-bottom: 1px solid #ddd;  padding: 10px;text-align: left;'>".$mos['matricula']."</td>
                <td style='border-bottom: 1px solid #ddd;  padding: 10px;text-align: left;'>".$mos['domicilio']."</td>
                <td style='border-bottom: 1px solid #ddd;  padding: 10px;text-align: left;'>".$mos['celular']."</td>
    
            </tr>";

}
$html .= "</table>";



// Require composer autoload
require_once __DIR__ . '/../vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
$mpdf->SetTitle('Reporte de Medicos');
// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output('reporte_medicos.pdf', 'I');
