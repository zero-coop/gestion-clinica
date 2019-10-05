<?php
require_once 'models/doctor.php';
require_once 'models/paciente.php';

class DoctorController{
	
	public function index(){
		Utils::isAdmin();
		$doctor = new Doctor();
		$doctores = $doctor->getAll();
		
		require_once 'views/doctor/index.php';
	}
	
	public function ver(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			
			// Conseguir doctor
			$doctor = new Doctor();
			$doctor->setId($id);
			$doctor = $doctor->getOne();
			
			// Conseguir pacientes;
			$paciente = new Paciente();
			$paciente->setDoctor_id($id);
			$pacientes = $paciente->getAll();
		}
		
		require_once 'views/doctor/ver.php';
	}
	
	public function crear(){
		Utils::isAdmin();
		require_once 'views/doctor/crear.php';
	}

	public function save(){
		Utils::isAdmin();
		if(isset($_POST)){
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$especialidad = isset($_POST['especialidad']) ? $_POST['especialidad'] : false;
			$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : false;
			$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
			$ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : false;
			
			if($nombre && $especialidad && $telefono && $direccion && $ciudad){
				$doctor = new Doctor();
				$doctor->setNombreyApellido($nombre);
				$doctor->setEspecialidad($especialidad);
				$doctor->setTelefono($telefono);
				$doctor->setDireccion($direccion);
				$doctor->setCiudad($ciudad);
				
				
				if(isset($_GET['id'])){
					$id = $_GET['id'];
					$doctor->setId($id);
					
					$save = $doctor->edit();
				}else{
					$save = $doctor->save();
				}
				
				if($save){
					$_SESSION['doctor'] = "complete";
				}else{
					$_SESSION['doctor'] = "failed";
				}
			}else{
				$_SESSION['doctor'] = "failed";
			}
		}else{
			$_SESSION['doctor'] = "failed";
		}
		header('Location:'.base_url.'doctor/index');
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