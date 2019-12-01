<?php
require_once 'models/paciente.php';
require_once 'models/recibo.php';

class carritoController
{

	public function index()
	{
		if(isset($_GET['id'])){
			$id_pedido=$_GET[id];
			
			require_once 'views/carrito/index.php';
		}
	}

	public function terminar(){

		if(isset($_POST)){
			
			$id_orden= isset($_POST['id']) ? $_POST['id'] : false;
			$metodo_pago= isset($_POST['apellido']) ? $_POST['apellido'] : false;
			$monto= isset($_POST['precio']) ? $_POST['precio'] : false;

			if($id_orden && $metodo_pago && $monto){
				$recibo=new Recibo();
				$recibo->setIdOrdenAtencion($id_orden);
				$recibo->setMetodosPago($metodo_pago);
				$recibo->setMonto($monto);
			}
		}

		header('Location:' . base_url . "recibo/index" );

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
