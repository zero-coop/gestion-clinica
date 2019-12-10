<?php
//Plantilla html
require_once 'paciente.php';

//Plantilla css
require_once 'paciente.php';

// Require composer autoload
require_once __DIR__ . '/../vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();

// Write some HTML code:
$mpdf->WriteHTML('paciente.php');

// Output a PDF file directly to the browser
$mpdf->Output();