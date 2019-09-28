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
}

?>