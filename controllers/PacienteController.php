<?php
require_once 'models/paciente.php';

class pacienteController
{

	public function index()
	{
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

	public function dashboard()
	{
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			//$edit = true;

			$paciente = new Paciente();
			$paciente->setId($id);
			$pac = $paciente->getOne();
			require_once 'views/paciente/dashboard.php';
		} else {
			header('Location:' . base_url . 'paciente/gestion');
		}

	}

	public function gestion()
	{
		//Utils::isAdmin();

		$paciente = new Paciente();
		$pacientes = $paciente->getAll();

		require_once 'views/paciente/gestion.php';
	}

	public function crear()
	{
		//Utils::isAdmin();
		require_once 'views/paciente/crear.php';
	}

	public function save()
	{
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
			$grupo_sanguineo = isset($_POST['grupo_sanguineo']) ? $_POST['grupo_sanguineo'] : false;
			$numero_afiliado = isset($_POST['numero_afiliado']) ? $_POST['numero_afiliado'] : false;
			// $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;

			if ($nombre && $apellido && $dni && $sexo && $telefono && $direccion && $provincia) {
				$paciente = new Paciente();
				$paciente->setApellido($apellido);
				$paciente->setNombre($nombre);
				$paciente->setDni($dni);
				$paciente->setSexo($sexo);
				$paciente->setTelefono($telefono);
				$paciente->setDireccion($direccion);
				$paciente->setProvincia($provincia);
				$paciente->setIdObra($obrasocial);
				$paciente->setFechaNacimiento($fecha_nacimiento);
				$paciente->setGrupoSanguineo($grupo_sanguineo);
				$paciente->setNumeroAfiliado($numero_afiliado);
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
					header('Location:'.base_url .'paciente/dashboard&id='.$paciente->id_paciente);
				} else {
					$_SESSION['paciente'] = "failed";
					header('Location:'.base_url .'paciente/gestion');
				}
			} else {
				$_SESSION['paciente'] = "failed";
			}
		} else {
			$_SESSION['paciente'] = "failed";
		}
		$paciente = Paciente::getUltimoPaciente();

		
	}

	public function editar()
	{
		//Utils::isAdmin();
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
		//Utils::isAdmin();
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

	public function habilitar()
	{
		Utils::isAdmin();

		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$paciente = new Paciente();
			$paciente->setId($id);
			$result = $paciente->habiliar();

			if ($result) {
				$_SESSION['update'] = 'complete';
			} else {
				$_SESSION['update'] = 'failed';
			}
		} else {
			$_SESSION['update'] = 'failed';
		}

		header('Location:' . base_url . 'paciente/gestion');
	}
}
