<?php

//Probar si se puede hacer el requiere de vendor/autoload aca

class ReporteController{

    public function paciente(){
        header('Location:' . base_url . 'reportes/paciente.php');
    }

    public function pacientebyId(){
        header('Location:' . base_url . 'reportes/pacientebyId.php');
    }

    public function medicos(){
        header('Location:' . base_url . 'reportes/medicos.php');
    }

    public function obrasociales(){
        header('Location:' . base_url . 'reportes/obrasociales.php');
    }

    public function registro(){
        header('Location:' . base_url . 'reportes/registro.php');
    }

    public function internaciones(){
        header('Location:' . base_url . 'reportes/internaciones.php');
    }
}
