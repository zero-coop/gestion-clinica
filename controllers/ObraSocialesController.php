<?php
require_once 'models/obrasociales.php';

class obrasocialesController
{


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

		$obra = new ObraSocial();
		$obras = $obra->getAll();

		require_once 'views/obrasociales/gestion.php';
	}

	public function crear()
	{
		Utils::isAdmin();
		require_once 'views/obrasociales/crear.php';
	}

	public function save()
	{
		Utils::isAdmin();
		if (isset($_POST)) {
			$apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$dni = isset($_POST['dni']) ? $_POST['dni'] : false;
			$sexo = isset($_POST['sexo']) ? $_POST['sexo'] : false;
			$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : false;
			$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
			$provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
			$obrasocial = isset($_POST['obrasocial']) ? $_POST['obrasocial'] : false;
			$fecha_nacimiento = isset($_POST['fecha_nacimiento']) ? $_POST['fecha_nacimiento'] : false;

			// $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;

			if ($nombre && $apellido && $dni && $sexo && $telefono && $direccion && $provincia && $obrasocial) {
				$obra = new Paciente();
				$obra->setApellido($apellido);
				$obra->setNombre($nombre);
				$obra->setDni($dni);
				$obra->setSexo($sexo);
				$obra->setTelefono($telefono);
				$obra->setDireccion($direccion);
				$obra->setProvincia($provincia);
				$obra->setIdObra($obrasocial);
				$obra->setFechaNacimiento($fecha_nacimiento);

				// Guardar la imagen
				if (isset($_FILES['imagen'])) {
					$file = $_FILES['imagen'];
					$filename = $file['name'];
					$mimetype = $file['type'];

					if ($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {

						if (!is_dir('uploads/images')) {
							mkdir('uploads/images', 0777, true);
						}

						$obra->setImagen($filename);
						move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);
					}
				}

				if (isset($_GET['id'])) {
					$id = $_GET['id'];
					$obra->setId($id);

					$save = $obra->edit();
				} else {
					$save = $obra->save();
				}

				if ($save) {
					$_SESSION['obra'] = "complete";
				} else {
					$_SESSION['obra'] = "failed";
				}
			} else {
				$_SESSION['obra'] = "failed";
			}
		} else {
			$_SESSION['obra'] = "failed";
		}
		header('Location:' . base_url . 'paciente/gestion');
	}

	public function editar()
	{
		Utils::isAdmin();
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$edit = true;

			$obra = new ObraSocial();
			$obra->setId($id);

			$pac = $paciente->getOne();

			require_once 'views/obrasociales/crear.php';
		} else {
			header('Location:' . base_url . 'obrasociales/gestion');
		}
	}

	public function eliminar()
	{
		Utils::isAdmin();

		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$obra = new ObraSocial();
			$obra->setId($id);
			$delete = $obra->delete();

			if ($delete) {
				$_SESSION['delete'] = 'complete';
			} else {
				$_SESSION['delete'] = 'failed';
			}
		} else {
			$_SESSION['delete'] = 'failed';
		}

		header('Location:' . base_url . 'obrasociales/gestion');
	}
}
