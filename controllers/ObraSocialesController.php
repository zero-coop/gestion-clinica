<?php
require_once 'models/obrasociales.php';

class obraSocialesController
{


	public function ver()
	{
		if (isset($_GET['id'])) {
			$id = $_GET['id'];

			$obra = new ObraSocial();
			$obra->setId($id);

			$obr = $obra->getOne();
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
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$cuit = isset($_POST['cuit']) ? $_POST['cuit'] : false;
			$correo = isset($_POST['correo']) ? $_POST['correo'] : false;
			$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : false;
			$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
			$provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
			$descuento = isset($_POST['descuento']) ? $_POST['descuento'] : false;

			// $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;

			if ($nombre && $cuit && $correo && $telefono && $direccion && $provincia && $descuento) {
				$obra = new ObraSocial();
				$obra->setNombre($nombre);
				$obra->setCuit($cuit);
				$obra->setCorreo($correo);
				$obra->setTelefono($telefono);
				$obra->setDireccion($direccion);
				$obra->setProvincia($provincia);
				$obra->setDescuento($descuento);


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
		header('Location:' . base_url . 'obrasociales/gestion');
	}

	public function editar()
	{
		Utils::isAdmin();
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$edit = true;

			$obra = new ObraSocial();
			$obra->setId($id);

			$obr = $obra->getOne();

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

	public function habilitar()
	{
		Utils::isAdmin();

		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$obra = new ObraSocial();
			$obra->setId($id);
			$result = $obra->habiliar();

			if ($result) {
				$_SESSION['update'] = 'complete';
			} else {
				$_SESSION['update'] = 'failed';
			}
		} else {
			$_SESSION['update'] = 'failed';
		}

		header('Location:' . base_url . 'obrasociales/gestion');
	}
}
