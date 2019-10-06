<?php
require_once 'models/paciente.php';

class pacienteController
{

	public function index(){
		$paciente = new Paciente();
		$pacientes = $paciente->getAll();

		// renderizar vista
		require_once 'views/paciente/destacados.php';
	}

	public function ver()
	{
		if (isset($_GET['id'])) {
			$id = $_GET['id'];

			$paciente = new Paciente();
			$paciente->setId($id);

			$pacient = $paciente->getOne();
		}
		require_once 'views/paciente/ver.php';
	}

	public function gestion()
	{
		Utils::isAdmin();

		$paciente = new Paciente();
		$pacientes = $paciente->getAll();

		require_once 'views/paciente/gestion.php';
	}

	public function crear()
	{
		Utils::isAdmin();
		require_once 'views/paciente/crear.php';
	}

	public function save()
	{
		Utils::isAdmin();
		if (isset($_POST)) {
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
			$sexo = isset($_POST['sexo']) ? $_POST['sexo'] : false;
			$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : false;
			$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
			$ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : false;
			$doctor = isset($_POST['doctor']) ? $_POST['doctor'] : false;
			// $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;

			if ($nombre && $descripcion && $sexo && $telefono && $direccion && $ciudad && $doctor) {
				$paciente = new Paciente();
				$paciente->setNombreyApellido($nombre);
				$paciente->setDescripcion($descripcion);
				$paciente->setSexo($sexo);
				$paciente->setTelefono($telefono);
				$paciente->setDireccion($direccion);
				$paciente->setCiudad($ciudad);
				$paciente->setDoctor_id($doctor);

				// Guardar la imagen
				if (isset($_FILES['imagen'])) {
					$file = $_FILES['imagen'];
					$filename = $file['name'];
					$mimetype = $file['type'];

					if ($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {

						if (!is_dir('uploads/images')) {
							mkdir('uploads/images', 0777, true);
						}

						$paciente->setImagen($filename);
						move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);
					}
				}

				if (isset($_GET['id'])) {
					$id = $_GET['id'];
					$paciente->setId($id);

					$save = $paciente->edit();
				} else {
					$save = $paciente->save();
				}

				if ($save) {
					$_SESSION['paciente'] = "complete";
				} else {
					$_SESSION['paciente'] = "failed";
				}
			} else {
				$_SESSION['paciente'] = "failed";
			}
		} else {
			$_SESSION['paciente'] = "failed";
		}
		header('Location:' . base_url . 'paciente/gestion');
	}

	public function editar()
	{
		Utils::isAdmin();
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$edit = true;

			$paciente = new Paciente();
			$paciente->setId($id);

			$pac = $paciente->getOne();

			require_once 'views/paciente/crear.php';
		} else {
			header('Location:' . base_url . 'paciente/gestion');
		}
	}

	public function eliminar()
	{
		Utils::isAdmin();

		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$paciente = new Paciente();
			$paciente->setId($id);

			$delete = $paciente->delete();
			if ($delete) {
				$_SESSION['delete'] = 'complete';
			} else {
				$_SESSION['delete'] = 'failed';
			}
		} else {
			$_SESSION['delete'] = 'failed';
		}

		header('Location:' . base_url . 'paciente/gestion');
	}
}
