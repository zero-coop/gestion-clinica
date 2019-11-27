<?php

class Pedido
{
    private $id_orden_atencion;
    private $id_medico;
    private $id_pacientexobrasocial;
    private $id_medicamento;
    private $id_servicio;
    private $id_recibo;
    private $descripcion;
    private $fecha;
    private $db;
    
    public function __construct()
    {
        $this->db = Database::connect();
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getIdMedico()
    {
        return $this->id_medico;
    }

    public function getIdPacientexObraSocial()
    {
        return $this->id_pacientexobrasocial;
    }

    public function getIdMedicamento()
    {
        return $this->id_medicamento;
    }

    public function getIdServicio()
    {
        return $this->id_servicio;
    }

    public function getIdRecibo()
    {
        return $this->id_recibo;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getFecha()
    {
        return $this->fecha;
    }


    public function setId($id_orden_atencion)
    {
        $this->id_orden_atencion = $id_orden_atencion;
    }

    public function setIdMedico($id_medico)
    {
        $this->id_medico = $id_medico;
    }

    public function setIdPacientexObraSocial($id_pacientexobrasocial)
    {
        $this->id_pacientexobrasocial = $id_pacientexobrasocial;
    }


    public function setIdMedicamento($id_medicamento)
    {
        $this->id_medicamento = $id_medicamento;
    }

    public function setIdServicio($id_servicio)
    {
        $this->id_servicio = $id_servicio;
    }

    public function setIdRecibo($id_recibo)
    {
        $this->id_recibo = $id_recibo;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getAll()
    {
        $pedidos = $this->db->query("SELECT * FROM ordenes_atencion ORDER BY id_orden_atencion DESC;");
        return $pedidos;
    }
    
    public function getOne()
    {
        $pedidos = $this->db->query("SELECT * FROM ordenes_atencion WHERE id_orden_atencion = {$this->getId()}");
        return $pedidos->fetch_object();
    }
    
    public static function getPaciente($id)
    {
		$db = Database::connect();
        $sql = "SELECT nombre FROM pacientes INNER JOIN pacientesxobrasociales ON pacientes.id_paciente = {$id};";
		$result = $db->query($sql);
		$r = $result->fetch_object();
        return $r->nombre;
    }
   
    public static function getMedico($id)
    {
		$db = Database::connect();
        $sql = "SELECT nombre FROM medicos INNER JOIN ordenes_atencion ON medicos.id_medico = {$id};";
		$result = $db->query($sql);
		$r = $result->fetch_object();
        return $r->nombre;
    }

    public static function getMedicamento($id)
    {
		$db = Database::connect();
        $sql = "SELECT nombre FROM medicamentos INNER JOIN ordenes_atencion ON medicamentos.id_medicamento = {$id};";
		$result = $db->query($sql);
		$r = $result->fetch_object();
        return $r->nombre;
    }


    public static function getServicio($id)
    {
		$db = Database::connect();
        $sql = "SELECT servicios.descripcion FROM servicios INNER JOIN ordenes_atencion ON servicios.id_servicio = {$id};";
        $result = $db->query($sql);
        $r = $result->fetch_assoc();
		//$r = $result->fetch_object();
        print_r ("nombre");
    }

    
     public function getOneByUser()
    {
        $sql = "SELECT p.id, p.precio FROM ordenes_atencion p "
                //. "INNER JOIN lineas_pedidos lp ON lp.pedido_id = p.id "
                . "WHERE p.usuario_id = {$this->getUsuario_id()} ORDER BY id DESC LIMIT 1";
            
        $pedido = $this->db->query($sql);
            
        return $pedido->fetch_object();
    }
    
    public function getAllByUser()
    {
        $sql = "SELECT p.* FROM ordenes_atencion p "
                . "WHERE p.usuario_id = {$this->getUsuario_id()} ORDER BY id DESC";
            
        $pedido = $this->db->query($sql);
            
        return $pedido;
    }
    
    
    public function getPacientesByPedido($id)
    {
        $sql = "SELECT * FROM pacientes WHERE id IN (SELECT paciente_id FROM lineas_pedidos WHERE pedido_id={$id})";
    
        // 	$sql = "SELECT pacientes.*,lineas_pedidos.* FROM pacientes INNER JOIN lineas_pedidos ON pacientes.id=lineas_pedidos.paciente_id WHERE lineas_pedidos.pedido_id={$id}";
                
        $pacientes = $this->db->query($sql);
            
        return $pacientes;
    }
    
    public function save()
    {
        $sql = "INSERT INTO pedidos VALUES(NULL, {$this->getUsuario_id()}, '{$this->getObraSocial()}', {$this->getPrecio()}, 'confirm', CURDATE(), CURTIME());";
        $save = $this->db->query($sql);
        
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }
    
    public function save_linea()
    {
        $sql = "SELECT LAST_INSERT_ID() as 'pedido';";
        $query = $this->db->query($sql);
        $pedido_id = $query->fetch_object()->pedido;
        
        foreach ($_SESSION['carrito'] as $elemento) {
            $paciente = $elemento['paciente'];
            
            $insert = "INSERT INTO lineas_pedidos VALUES(NULL, {$pedido_id}, {$paciente->id})";
            $save = $this->db->query($insert);
            
            // //			var_dump($producto);
// //			var_dump($insert);
// //			echo $this->db->error;
// // //
        }
    }
    
    public function edit()
    {
        $sql = "UPDATE pedidos SET estado='{$this->getEstado()}' ";
        $sql .= " WHERE id={$this->getId()};";
        
        $save = $this->db->query($sql);
        
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }
} 
