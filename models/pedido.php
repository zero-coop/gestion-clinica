<?php

class Pedido{
	private $id;
	private $usuario_id;
	private $obra_social;
	private $precio;
	private $estado;
	private $fecha;
	private $hora;

	private $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}
	
	function getId() {
		return $this->id;
	}

	function getUsuario_id() {
		return $this->usuario_id;
	}

	function getObraSocial() {
		return $this->obra_social;
	}

	function getPrecio() {
		return $this->precio;
	}

	function getEstado() {
		return $this->estado;
	}

	function getFecha() {
		return $this->fecha;
	}

	function getHora() {
		return $this->hora;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setUsuario_id($usuario_id) {
		$this->usuario_id = $usuario_id;
	}

	function setObraSocial($obra_social) {
		$this->obra_social = $this->db->real_escape_string($obra_social);
	}


	function setPrecio($precio) {
		$this->precio = $precio;
	}

	function setEstado($estado) {
		$this->estado = $estado;
	}

	function setFecha($fecha) {
		$this->fecha = $fecha;
	}

	function setHora($hora) {
		$this->hora = $hora;
	}

	public function getAll(){
		$productos = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC");
		return $productos;
	}
	
	public function getOne(){
		$producto = $this->db->query("SELECT * FROM pedidos WHERE id = {$this->getId()}");
		return $producto->fetch_object();
	}
	
	public function getOneByUser(){
		$sql = "SELECT p.id, p.precio FROM pedidos p "
				//. "INNER JOIN lineas_pedidos lp ON lp.pedido_id = p.id "
				. "WHERE p.usuario_id = {$this->getUsuario_id()} ORDER BY id DESC LIMIT 1";
			
		$pedido = $this->db->query($sql);
			
		return $pedido->fetch_object();
	}
	
	public function getAllByUser(){
		$sql = "SELECT p.* FROM pedidos p "
				. "WHERE p.usuario_id = {$this->getUsuario_id()} ORDER BY id DESC";
			
		$pedido = $this->db->query($sql);
			
		return $pedido;
	}
	
	
	public function getPacientesByPedido($id){
		$sql = "SELECT * FROM pacientes WHERE id IN (SELECT paciente_id FROM lineas_pedidos WHERE pedido_id={$id})";
	
// 	$sql = "SELECT pacientes.*,lineas_pedidos.* FROM pacientes INNER JOIN lineas_pedidos ON pacientes.id=lineas_pedidos.paciente_id WHERE lineas_pedidos.pedido_id={$id}";
				
		$pacientes = $this->db->query($sql);
			
		return $pacientes;
	}
	
	public function save(){
		$sql = "INSERT INTO pedidos VALUES(NULL, {$this->getUsuario_id()}, '{$this->getObraSocial()}', {$this->getPrecio()}, 'confirm', CURDATE(), CURTIME());";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	
	public function save_linea(){
		$sql = "SELECT LAST_INSERT_ID() as 'pedido';";
		$query = $this->db->query($sql);
		$pedido_id = $query->fetch_object()->pedido;
		
		foreach($_SESSION['carrito'] as $elemento){
			$paciente = $elemento['paciente'];
			
			$insert = "INSERT INTO lineas_pedidos VALUES(NULL, {$pedido_id}, {$paciente->id})";
			$save = $this->db->query($insert);
			
// //			var_dump($producto);
// //			var_dump($insert);
// //			echo $this->db->error;
// // //	
		} 
	}
	
	public function edit(){
		$sql = "UPDATE pedidos SET estado='{$this->getEstado()}' ";
		$sql .= " WHERE id={$this->getId()};";
		
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
}