<?php
class PDF
{
    
    public function __construct()
    {
        require_once __DIR__ . '/../vendor/autoload.php';
        // Create an instance of the class:
        $mpdf = new \Mpdf\Mpdf();

        // Write some HTML code:
        $mpdf->WriteHTML('HOLAAAAAA');

        // Output a PDF file directly to the browser

        $mpdf->Output();
    }
}
