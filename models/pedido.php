<?php

class Pedido
{
    private $id_orden_atencion;
    private $id_medico;
    private $id_pacientexobrasocial;
    private $medicamento;
    private $id_servicio;
    private $descripcion;
    private $fecha;
    private $db;
    
    public function __construct()
    {
        $this->db = Database::connect();
    }
    
    public function getId_orden_atencion()
    {
        return $this->id_orden_atencion;
    }

    public function getIdMedico()
    {
        return $this->id_medico;
    }

    public function getIdPacientexObraSocial()
    {
        return $this->id_pacientexobrasocial;
    }

    public function getMedicamento()
    {
        return $this->medicamento;
    }

    public function getIdServicio()
    {
        return $this->id_servicio;
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

    public function setIdPaciente($id_paciente){
        $this->id_paciente = $id_paciente;
    }


    public function setMedicamento($medicamento)
    {
        $this->medicamento = $medicamento;
    }

    public function setIdServicio($id_servicio)
    {
        $this->id_servicio = $id_servicio;
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
        $pedidos = $this->db->query("SELECT ordenes_atencion.id_orden_atencion,medicos.nombre AS medico,pacientes.nombre,servicios.descripcion,recibos.id_recibo,ordenes_atencion.fecha FROM pacientes INNER JOIN pacientesxobrasociales on pacientes.id_paciente=pacientesxobrasociales.id_pacientexobrasocial INNER JOIN ordenes_atencion ON pacientesxobrasociales.id_pacientexobrasocial=ordenes_atencion.id_pacientexobrasocial INNER JOIN servicios ON ordenes_atencion.id_servicio=servicios.id_servicio INNER JOIN medicos ON ordenes_atencion.id_medico=medicos.id_medico INNER JOIN recibos ON ordenes_atencion.id_recibo=recibos.id_recibo ORDER BY ordenes_atencion.id_orden_atencion DESC;");
        return $pedidos;
    }
    public function getAllServicios()
    {
        $db = Database::connect();
        $servicios = $db->query("SELECT * FROM servicios");
        return $servicios;
    }
    
    public function getOne()
    {
        $pedidos = $this->db->query("SELECT * FROM ordenes_atencion WHERE id_orden_atencion = {$this->getId()}");
        return $pedidos->fetch_object();
    }
    
    public static function getPaciente($id)
    {
		$db = Database::connect();
        $sql = "SELECT * FROM pacientes INNER JOIN pacientesxobrasociales ON pacientes.id_paciente = {$id};";
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

    public static function getServicio($id)
    {
		$db = Database::connect();
        $sql = "SELECT * FROM servicios WHERE id_servicio = (SELECT id_servicio FROM ordenes_atencion WHERE id_orden_atencion = {$id});";
        $result = $db->query($sql);
        //$r = $result->fetch_assoc();
        $r = $result->fetch_object();
        return $r;
    }
    public static function getPacientexObra($id_paciente)
    {
		$db = Database::connect();
        $sql = "SELECT id_pacientexobrasocial FROM pacientesxobrasociales INNER JOIN pacientes ON pacientes.id_paciente = pacientesxobrasociales.id_paciente and pacientes.id_paciente={$id_paciente};";
        $resultado = $db->query($sql);
        $result= $resultado->fetch_object();
        $r=$result->id_pacientexobrasocial;
        return $r;
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
        $sql = "SELECT * FROM pedidos WHERE id IN (SELECT paciente_id FROM lineas_pedidos WHERE pedido_id={$id})";
    
        // 	$sql = "SELECT pacientes.*,lineas_pedidos.* FROM pacientes INNER JOIN lineas_pedidos ON pacientes.id=lineas_pedidos.paciente_id WHERE lineas_pedidos.pedido_id={$id}";
                
        $pacientes = $this->db->query($sql);
            
        return $pacientes;
    }
    
    public function save()
    {
        $sql = "INSERT INTO ordenes_atencion VALUES (NULL, {$this->getIdMedico()}, {$this->getIdPacientexObraSocial()}, '{$this->getMedicamento()}', {$this->getIdServicio()},NULL,'{$this->getDescripcion()}',CURDATE())";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }
    
    
    public function edit()
    {
        $sql = "UPDATE ordenes_atencion SET id_medico={$this->getIdMedico()},id_servicio={$this->getId_servicio}, id_medicamento='{$this->getMedicamento()}';";
        $sql = " WHERE id={$this->getId()};";
        
        $save = $this->db->query($sql);
        
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }
} 
