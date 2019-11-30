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
        if (isset($_POST)) {
            $id_paciente = isset($_POST['id_paciente']) ? $_POST['id_paciente'] : false;
            $medico = isset($_POST['medico']) ? $_POST['medico'] : false;
            $servicio = isset($_POST['servicio']) ? $_POST['servicio'] : false;
            $medicamento = isset($_POST['medicamento']) ? $_POST['medicamento'] : false;
            $observaciones = isset($_POST['observaciones']) ? $_POST['observaciones'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            
            
            if ($id_paciente && $medico && $servicio && $precio) {
                $pedido = new Pedido();
                $paciente=$pedido->getPacientexObra($id_paciente);
                $pedido->setIdPacientexObraSocial($paciente);
                $pedido->setIdMedico($medico);
                $pedido->setIdServicio($servicio);
                $pedido->setPrecio($precio);
                $pedido->setMedicamento($medicamento);
                $pedido->setDescripcion($observaciones);
                

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $pedido->setId($id);

                    $save = $pedido->edit();
                } else {
                    $save = $pedido->save();
                }


                if ($save) {
                    $_SESSION['pedido'] = "complete";
                    header('Location:' . base_url . 'pedido/gestion');
                } else {
                    $_SESSION['pedido'] = "failed";
                    header('Location:' . base_url . 'pedido/gestion');
                }
            }
        } else {
            $_SESSION['paciente'] = "failed";
            header('Location:' . base_url . 'paciente/gestion');
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
            header('Location:' . base_url . 'pedido/mis_pedidos');
        }
    }


    public function gestion()
    {
        //Utils::isAdmin();

        $pedido = new Pedido();
        $pedidos = $pedido->getAll();

        require_once 'views/pedido/gestion.php';
    }

    public function eliminar()
	{
		//Utils::isAdmin();
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$pedido = new Pedido();
			$pedido->setId_orden_atencion($id);
			$delete = $pedido->delete();

			if ($delete) {
				$_SESSION['delete'] = 'complete';
			} else {
				$_SESSION['delete'] = 'failed';
			}
		} else {
			$_SESSION['delete'] = 'failed';
		}

		header('Location:' . base_url . 'pedido/gestion');
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


}
