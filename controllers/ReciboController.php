<?php
require_once 'models/paciente.php';
require_once 'models/recibo.php';

class reciboController
{

	public function crear()
	{
		if(isset($_GET['id'])){
			$id_pedido=$_GET['id'];
			$devolve= new Recibo();
			$devolver=$devolve->getSetearId($id_pedido);
			
			require_once 'views/recibo/crear.php';
		}
	}

	public function continuar(){

		if(isset($_POST)){
			$precio=$_POST['precio'];
			$metodo=$_POST['id_metodo'];
			require_once 'views/recibo/finalizar.php';
			return $precio && $metodo;

		}
	}

	public function terminar(){

		if(isset($_POST)){
			
			$id_orden= isset($_POST['id']) ? $_POST['id'] : false;
			$metodo_pago= isset($_POST['id_metodo']) ? $_POST['id_metodo'] : false;
			$monto= isset($_POST['precio']) ? $_POST['precio'] : false;

			if($id_orden && $metodo_pago && $monto){
				$recibo=new Recibo();
				$recibo->setIdOrdenAtencion($id_orden);
				$recibo->setMetodosPago($metodo_pago);
				$recibo->setMonto($monto);
			}
			header('Location:' . base_url . "recibo/gestion" );
		}


	}


	



}
