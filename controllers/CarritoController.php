<?php
require_once 'models/paciente.php';

class carritoController
{

	public function index()
	{
		if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) {
			$carrito = $_SESSION['carrito'];
		} else {
			$carrito = array();
		}
		require_once 'views/carrito/index.php';
	}

	public function add()
	{
		if (isset($_GET['id'])) {
			$paciente_id = $_GET['id'];
		} else {
			header('Location:' . base_url);
		}

		if (isset($_SESSION['carrito'])) {
			$counter = 0;
			foreach ($_SESSION['carrito'] as $indice => $elemento) {
				if ($elemento['id_paciente'] == $paciente_id) {
					$_SESSION['carrito'][$indice]['unidades']++;
					$counter++;
				}
			}
		}

		if (!isset($counter) || $counter == 0) {
			// Conseguir paciente
			$paciente = new Paciente();
			$paciente->setId($paciente_id);
			$paciente = $paciente->getOne();

			// Añadir al carrito
			if (is_object($paciente)) {
				$_SESSION['carrito'][] = array(
					"id_paciente" => $paciente->id,
					"precio" => $paciente->precio,
					"unidades" => 1,
					"paciente" => $paciente
				);
			}
		}

		header("Location:" . base_url . "carrito/index");
	}

	public function delete()
	{
		if (isset($_GET['index'])) {
			$index = $_GET['index'];
			unset($_SESSION['carrito'][$index]);
		}
		header("Location:" . base_url . "carrito/index");
	}


	public function delete_all()
	{
		unset($_SESSION['carrito']);
		header("Location:" . base_url . "carrito/index");
	}
}
