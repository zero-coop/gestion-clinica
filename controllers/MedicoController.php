<?php
require_once 'models/medico.php';
require_once 'models/paciente.php';

class MedicoController{
	
	public function index()
	{
		$medico = new Medico();
		$medicos = $medico->getAll();
		
		//carga la vista
		require_once 'views/medico/index.php';
	}
	
	public function ver()
	{
		if(isset($_GET['id'])) {
			$id = $_GET['id'];
			
			// Conseguir doctor
			$medico = new Medico();
			$medico->setId_medico($id);
			$medicos = $medico->getOne();
			require_once 'views/medico/ver.php';
			return $medicos;
			
		}
		
	}

	public function gestion()
	{
		Utils::isAdmin();

		$medico = new Doctor();
		$medicos = $medico->getAll();

		require_once 'views/medico/index.php';
	}
	
	public function crear(){
		Utils::isAdmin();
		require_once 'views/medico/crear.php';
	}

	public function save()
	{

		if (isset($_POST)) {
			$apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$dni = isset($_POST['dni']) ? $_POST['dni'] : false;
			$especialidad = isset($_POST['especialidad']) ? $_POST['especialidad'] : false;
			$matricula = isset($_POST['matricula']) ? $_POST['matricula'] : false;
			$domicilio = isset($_POST['domicilio']) ? $_POST['domicilio'] : false;
			$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : false;
			$celular = isset($_POST['celular']) ? $_POST['celular'] : false;

			if ($nombre && $apellido && $dni && $especialidad && $matricula && $domicilio && $telefono && $celular) {
				$medico = new Medico();
				$medico->setApellido($apellido);
				$medico->setNombre($nombre);
				$medico->setDni($dni);
				$medico->setEspecialidad($especialidad);
				$medico->setMatricula($matricula);
				$medico->setDomicilio($domicilio);
				$medico->setTelefono($telefono);
				$medico->setCelular($celular);

				if (isset($_GET['id'])) {
					$id = $_GET['id'];
					$medico->setId_medico($id);
					$save = $medico->edit();
				} else {
					$save = $medico->save();
				}

				if ($save) {
					$_SESSION['medico'] = "complete";
				} else {
					$_SESSION['medico'] = "failed";
				}
			} else {
				$_SESSION['medico'] = "failed";
			}
		} else {
			$_SESSION['medico'] = "failed";
		}
		header('Location:' . base_url . 'medico/index');
	}

	
	public function editar(){
		//Utils::isAdmin();
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$edit = true;
			$medico = new Medico();
			$medico->setId_medico($id);
			
			$med = $medico->getOne();
			require_once 'views/medico/crear.php';
			
		}else{
			header('Location:'.base_url.'medico/index');
		}
	}
	
	// public function save(){
	// 	Utils::isAdmin();
	//     if(isset($_POST) && isset($_POST['nombre'])){
	// 		// Guardar el doctor en bd
	// 		$doctor = new Doctor();
	// 		$doctor->setNombreyApellido($_POST['nombre']);
	// 		$doctor->setTelefono($_POST['telefono']);
	// 		$doctor->setDireccion($_POST['direccion']);
	// 		$doctor->setCiudad($_POST['ciudad']);
	// 		$save = $doctor->save();
	// 	}
	// 	header("Location:".base_url."doctor/index");
	// }
	//
	
	public function eliminar(){
		Utils::isAdmin();
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$medico = new Medico();
			$medico->setId_medico($id);
			
			$delete = $medico->delete();
			if($delete){
				$_SESSION['delete'] = 'complete';
			}else{
				$_SESSION['delete'] = 'failed';
			}
		}else{
			$_SESSION['delete'] = 'failed';
		}
		
		header('Location:'.base_url.'medico/index');
	}
	
}