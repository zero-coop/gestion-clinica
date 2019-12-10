<?php

//Probar si se puede hacer el requiere de vendor/autoload aca

class ReporteController{

    public function pdf(){
        header('Location:' . base_url . 'reportes/test.php');
    }
}


?>