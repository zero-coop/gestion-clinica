<?php
require_once 'models/doctor.php';
require_once 'models/paciente.php';

class DoctorController{
	
	public function index()
	{
		$medico = new Doctor();
		$medicos = $medico->getAll();
		
		//carga la vista
		require_once 'views/doctor/index.php';
	}
	
	public function ver()
	{
		if(isset($_GET['id'])) {
			$id = $_GET['id'];
			
			// Conseguir doctor
			$doctor = new Doctor();
			$doctor->setId($id);
			$doctor = $doctor->getOne();
			
			// Conseguir pacientes;
			//$paciente = new Paciente();
			//$paciente->setDoctor_id($id);
			//$pacientes = $paciente->getAll();
		}
		
		require_once 'views/doctor/ver.php';
	}

	public function gestion()
	{
		Utils::isAdmin();

		$doctor = new Doctor();
		$doctores = $doctor->getAll();

		require_once 'views/doctor/index.php';
	}
	
	public function crear(){
		Utils::isAdmin();
		require_once 'views/doctor/crear.php';
	}

	public function save()
	{
		Utils::isAdmin();
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
				$doctor = new Doctor();
				$doctor->setApellido($apellido);
				$doctor->setNombre($nombre);
				$doctor->setDni($dni);
				$doctor->setEspecialidad($especialidad);
				$doctor->setMatricula($matricula);
				$doctor->setDomicilio($domicilio);
				$doctor->setTelefono($telefono);
				$doctor->setCelular($celular);

				if (isset($_GET['id'])) {
					$id = $_GET['id'];
					$doctor->setId_medico($id);

					$save = $doctor->edit();
				} else {
					$save = $doctor->save();
				}

				if ($save) {
					$_SESSION['doctor'] = "complete";
				} else {
					$_SESSION['doctor'] = "failed";
				}
			} else {
				$_SESSION['doctor'] = "failed";
			}
		} else {
			$_SESSION['doctor'] = "failed";
		}
		header('Location:' . base_url . 'doctor/index');
	}

	
	public function editar(){
		Utils::isAdmin();
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$edit = true;
			
			$doctor = new Doctor();
			$doctor->setId($id);
			
			$doc = $doctor->getOne();
			
			require_once 'views/doctor/crear.php';
			
		}else{
			header('Location:'.base_url.'doctor/index');
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
			$doctor = new Doctor();
			$doctor->setId($id);
			
			$delete = $doctor->delete();
			if($delete){
				$_SESSION['delete'] = 'complete';
			}else{
				$_SESSION['delete'] = 'failed';
			}
		}else{
			$_SESSION['delete'] = 'failed';
		}
		
		header('Location:'.base_url.'doctor/index');
	}
	
}