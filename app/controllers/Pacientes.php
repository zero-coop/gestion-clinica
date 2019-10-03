<?php
require_once PATH_MODELS . 'PacientesModel.php';

class Pacientes extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function exec()
	{
		$pacientes = $this->alluser();
		$this->view->render(__CLASS__, $pacientes);
	}
	
	public function alluser(){
		$pacientes = new PacientesModel();
		return $pacientes->getAll();
	}

	public function editar(){
		$param = array (
			'pagina' => "editar"
		);
		$this->view->render(__CLASS__, $param);
	}

	public function guardarpaciente(){
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$nombre = filter_var(strtolower($_POST['nombre']), FILTER_SANITIZE_STRING);
			$apellido = filter_var(strtolower($_POST['apellido']), FILTER_SANITIZE_STRING);
			$cuil = filter_var(strtolower($_POST['cuil']), FILTER_SANITIZE_STRING);
			$sexo = filter_var(strtolower($_POST['sexo']), FILTER_SANITIZE_STRING);
			$telefono = filter_var(strtolower($_POST['telefono']), FILTER_SANITIZE_STRING);
			$direccion = filter_var(strtolower($_POST['direccion']), FILTER_SANITIZE_STRING);
			$provincia = filter_var(strtolower($_POST['provincia']), FILTER_SANITIZE_STRING);
			$historia = filter_var(strtolower($_POST['historia']), FILTER_SANITIZE_STRING);

			$paciente = new PacientesModel();
			$paciente->setNombre($nombre);
			$paciente->setApellido($apellido);
			$paciente->setCuil($cuil);
			$paciente->setSexo($sexo);
			$paciente->setTelefono($telefono);
			$paciente->setDireccion($direccion);
			$paciente->setProvincia($provincia);
			$paciente->setHistoria($historia);
			
		
			$save = $paciente->guardar();

			if($save){
				$_SESSION['paciente'] = "complete";
				
			}else{
				$_SESSION['paciente'] = "failed";
			}
		}else{
			$_SESSION['paciente'] = "failed";
		}
		header('Location:'. FOLDER_PATH . 'pacientes');
	}

}
