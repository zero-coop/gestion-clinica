<?php

class Recibo{
    private $id;
    private $id_metodos_pago;
    private $id_orden_atencion;
    private $monto;
    private $fecha;
    private $db;

	public function __construct()
	{
		$this->db = Database::connect();
    }
    
    function getId()
	{
		return $this->id;
	}

	function getIdMetodosPago()
	{
		return $this->id_metodos_pago;
	}
	function getIdOrdenAtencion()
	{
		return $this->id_orden_atencion;
	}

	function getMonto()
	{
		return $this->monto;
	}

	function getFecha()
	{
		return $this->fecha;
    }
    
    function setId($id)
	{
		$this->id = $id;
	}

	function setIdMetodosPago($id_metodos_pago)
	{
		$this->id_metodos_pago = $this->db->real_escape_string($id_metodos_pago);
	}
	function setIdOrdenAtencion($id_orden_atencion)
	{
		$this->id_orden_atencion = $this->db->real_escape_string($id_orden_atencion);
	}

	function setMonto($monto)
	{
		$this->monto = $this->db->real_escape_string($monto);
	}

	function setFecha($fecha)
	{
		$this->fecha = $this->db->real_escape_string($fecha);
	}

	public function getAll()
	{
		$recibos = $this->db->query("SELECT * FROM recibos ORDER BY id DESC");
		return $recibos;
	}
	public function getRecargo($metodo)
	{
		$recargo = $this->db->query("SELECT * FROM metodos_pago WHERE id_metodo_pago=$metodo");
		return $recargo;
	}
	
	public function save(){
		$sql = "INSERT INTO recibos VALUES(NULL, {$this->getIdMetodosPago()}, {$this->IdOrdenAtencion()}, {$this->getMonto()},CURDATE());";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

	public function getSetearId($id_pedido){
		$recibos = $this->db->query("SELECT ordenes_atencion.id_orden_atencion FROM ordenes_atencion WHERE id_orden_atencion=$id_pedido");
		return $recibos;
	}




}