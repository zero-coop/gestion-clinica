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
			$id_orden=$_POST['id_orden'];
			$precio=$_POST['precio'];
			$metodo=$_POST['id_metodo'];
			$recargo= new Recibo();
			$recargos=$recargo->getRecargo($metodo);
			$todo=new Recibo();
			$terminado=$todo->mostrarOrdenCompleta($id_orden);
			$obra=new Recibo();
			$desObra=$obra->getDescObra($id_orden);
			require_once 'views/recibo/finalizar.php';
		    return $id_orden && $precio && $metodo && $desObra && $recargos && $terminado;
		}
	}
	
	public function terminar(){
		
		if(isset($_POST)){
			
			$id_orden= isset($_POST['id']) ? $_POST['id'] : false;
			$metodo_pago= isset($_POST['metodo']) ? $_POST['metodo'] : false;
			$monto= isset($_POST['precio']) ? $_POST['precio'] : false;
			
			if($id_orden && $metodo_pago && $monto){
				$recibo=new Recibo();
				$recibo->setIdOrdenAtencion($id_orden);
				$recibo->setIdMetodosPago($metodo_pago);
				$recibo->setMonto($monto);
				$recibo->save();
				$recibo_terminado=$recibo->getReciboTerminado($id_orden);
				require_once 'views/recibo/terminado.php';
				return $recibo_terminado;

			}
		}
		
		
	}
	public function terminado(){
		
		require_once 'views/recibo/terminado.php';
	}

	public function registro(){
		$todo=new Recibo();
		$mostrar=$todo->getInicio();
		require_once 'views/recibo/registro.php';
		return $mostrar;
	}


	



}
