<?php

//Probar si se puede hacer el requiere de vendor/autoload aca

class ReporteController{

    public function paciente(){
        header('Location:' . base_url . 'reportes/paciente.php');
    }

    public function medicos(){
        header('Location:' . base_url . 'reportes/paciente.php');
    }

    public function ordensociales(){
        header('Location:' . base_url . 'reportes/paciente.php');
    }

}


?>