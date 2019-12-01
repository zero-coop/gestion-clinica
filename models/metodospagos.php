<?php

class MetodosPagos{
    private $id_metodos_pago;
    private $metodo;
    private $recargo;
    private $fecha;
    private $db;

	public function __construct()
	{
		$this->db = Database::connect();
    }

    function getId(){
        return $this->id_metodos_pago;
    }
    
	function getMetodos()
	{
		return $this->metodo;
	}
	function getRecargo()
	{
		return $this->recargo;
	}

	function getFecha()
	{
		return $this->fecha;
	}

	function setId($id_metodos_pago)
	{
		$this->id_metodos_pago = $this->db->real_escape_string($id_metodos_pago);
	}

	function setMetodo($metodo)
	{
		$this->metodo = $this->db->real_escape_string($metodo);
	}
	function setRecargo($recargo)
	{
		$this->recargo = $this->db->real_escape_string($recargo);
	}

	function setFecha($fecha)
	{
		$this->fecha = $this->db->real_escape_string($fecha);
	}

	public function getAll()
	{
		$metodos = $this->db->query("SELECT * FROM metodos_pagos ORDER BY id_metodos_pago DESC");
		return $metodos;
	}
	
	public function save(){
		$sql = "INSERT INTO metodos_pagos VALUES(NULL, '{$this->getMetodo()}', {$this->getRecargo()},CURDATE());";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

}