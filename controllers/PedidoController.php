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
