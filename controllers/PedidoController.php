<?php
require_once 'models/pedido.php';
require_once 'models/medico.php';
require_once 'models/paciente.php';

class pedidoController
{
     public function index()
    {
        $pedido = new Pedido();
        $pedidos = $pedido->getAll();
        
        require_once 'views/pedido/gestion.php';
    }
    
	public function save()
    {
		
        if (isset($_POST) && isset($_GET)) {
			$paciente= isset($_GET['id']) ? $_POST['id'] : false;
			$medico = isset($_POST['medico']) ? $_POST['medico'] : false;
			$servicio = isset($_POST['servicio']) ? $_POST['servicio'] : false;
			$medicamento = isset($_POST['medicamento']) ? $_POST['medicamento'] : false;
			$observaciones = isset($_POST['observaciones']) ? $_POST['observaciones'] : false;

			if ($paciente && $medico && $servicio && $medicamento && $observaciones) {
				$pedido = new Pedido();
				$pedido->setIdPacientexObraSocial($paciente);
				$pedido->setIdMedico($medico);
				$pedido->setIdServicio($servicio);
				$pedido->setMedicamento($medicamento);
				$pedido->setDescripcion($observaciones);
		

				// if (isset($_GET['id'])) {
				// 	$id = $_GET['id'];
				// 	$pedido->setId($id);

				// 	$save = $pedido->edit();
				// } else {
					$save = $pedido->save();
				}

				if ($save) {
					$_SESSION['pedido'] = "complete";
					header('Location:'.base_url .'pedido/dashboard&id='.$paciente->id_paciente);
				} else {
					$_SESSION['pedido'] = "failed";
					header('Location:'.base_url .'pedido/gestion');
				}
			} else {
				$_SESSION['paciente'] = "failed";
			}

		
	}
    
    
     public function confirmado()
    {
        if (isset($_SESSION['identity'])) {
            $identity = $_SESSION['identity'];
            $pedido = new Pedido();
            $pedido->setUsuario_id($identity->id);
            
            $pedido = $pedido->getOneByUser();
            
            $pedido_pacientes = new Pedido();
            $pacientes = $pedido_pacientes->getPacientesByPedido($pedido->id);
        }
        require_once 'views/pedido/confirmado.php';
	}
    
     public function mis_pedidos()
    {
        Utils::isIdentity();
        $usuario_id = $_SESSION['identity']->id;
        $pedido = new Pedido();
        
        // Sacar los pedidos del usuario
        $pedido->setUsuario_id($usuario_id);
        $pedidos = $pedido->getAllByUser();
        
        require_once 'views/pedido/mis_pedidos.php';
    } 
    
     public function detalle()
    {
        Utils::isIdentity();
        
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            
            // Sacar el pedido
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido = $pedido->getOne();
            
            // Sacar los poductos
            $pedido_pacientes = new Pedido();
            $pacientes = $pedido_pacientes->getPacientesByPedido($id);
            
            require_once 'views/pedido/detalle.php';
        } else {
            header('Location:'.base_url.'pedido/mis_pedidos');
        }
    }
     

    public function gestion()
    {
        //Utils::isAdmin();

        $pedido = new Pedido();
        $pedidos = $pedido->getAll();
        
        require_once 'views/pedido/gestion.php';
    }

    public function crear()
	{
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			//$edit = true;

			$paciente = new Paciente();
			$paciente->setId($id);
			$pac = $paciente->getOne();
			require_once 'views/pedido/crear.php';
		} else {
			header('Location:' . base_url . 'paciente/gestion');
		}
	}

    
    public function editar()
	{
		//Utils::isAdmin();
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$edit = true;

			$pedido = new Pedido();
			$pedido->setId($id_orden_atencion);
			$ped = $pedido->getOne();
			require_once 'views/pedido/crear.php';
		} else {
			header('Location:' . base_url . 'pedido/gestion');
		}
	}
    
     public function estado()
    {
        Utils::isAdmin();
        if (isset($_POST['pedido_id']) && isset($_POST['estado'])) {
            // Recoger datos form
            $id = $_POST['pedido_id'];
            $estado = $_POST['estado'];
            
            // Upadate del pedido
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido->setEstado($estado);
            $pedido->edit();
            
            header("Location:".base_url.'pedido/detalle&id='.$id);
        } else {
            header("Location:".base_url);
        }
    } 
}
