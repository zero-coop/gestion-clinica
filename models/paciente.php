<?php

class Paciente{
	private $id;
	private $doctor_id;
	private $nombreyApellido;
	private $descripcion;
	private $sexo;
	private $telefono;
	private $direccion;
	private $ciudad;
	private $fecha;
	private $imagen;

	private $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}
	
	function getId() {
		return $this->id;
	}

	function getDoctor_id() {
		return $this->doctor_id;
	}

	function getNombreyApellido() {
		return $this->nombreyApellido;
	}

	function getDescripcion() {
		return $this->descripcion;
	}

	function getSexo() {
		return $this->sexo;
	}

	function getTelefono() {
		return $this->telefono;
	}

	function getDireccion() {
		return $this->direccion;
	}

	function getCiudad() {
		return $this->ciudad;
	}

	function getFecha() {
		return $this->fecha;
	}

	function getImagen() {
		return $this->imagen;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setDoctor_id($doctor_id) {
		$this->doctor_id = $doctor_id;
	}

	function setNombreyApellido($nombreyApellido) {
		$this->nombreyApellido = $this->db->real_escape_string($nombreyApellido);
	}

	function setDescripcion($descripcion) {
		$this->descripcion = $this->db->real_escape_string($descripcion);
	}

	function setSexo($sexo) {
		$this->sexo = $this->db->real_escape_string($sexo);
	}

	function setTelefono($telefono) {
		$this->telefono = $this->db->real_escape_string($telefono);
	}

	function setDireccion($direccion) {
		$this->direccion = $this->db->real_escape_string($direccion);
	}

	function setCiudad($ciudad) {
		$this->ciudad = $ciudad;
	}

	function setFecha($fecha) {
		$this->fecha = $fecha;
	}

	function setImagen($imagen) {
		$this->imagen = $imagen;
	}

	public function getAll(){
		$pacientes = $this->db->query("SELECT * FROM pacientes ORDER BY id ASC");
		return $pacientes;
	}
	
	public function getAllDoctor(){
		$sql = "SELECT pacientes.*, doctores.nombreyApellido FROM pacientes"
				. "INNER JOIN doctores ON doctores.id = pacientes.doctor_id "
				. "WHERE pacientes.doctor_id = {$this->getDoctor_id()} "
				. "ORDER BY id DESC";
		$pacientes = $this->db->query($sql);
		return $pacientes;
	}
	
	public function getRandom($limit){
		$pacientes = $this->db->query("SELECT * FROM pacientes ORDER BY RAND() LIMIT $limit");
		return $pacientes;
	}
	
	public function getOne(){
		$paciente = $this->db->query("SELECT * FROM pacientes WHERE id = {$this->getId()}");
		return $paciente->fetch_object();
	}
	
	public function save(){
		$sql = "INSERT INTO pacientes VALUES(NULL, {$this->getDoctor_id()}, '{$this->getNombreyApellido()}', '{$this->getDescripcion()}', '{$this->getSexo()}',{$this->getTelefono()}, '{$this->getDireccion()}', '{$this->getCiudad()}', CURDATE(), '{$this->getImagen()}');";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	
	public function edit(){
		$sql = "UPDATE pacientes SET nombre='{$this->getNombreyApellido()}', descripcion='{$this->getDescripcion()}', sexo='{$this->getSexo()}', telefono={$this->getTelefono()}, direccion='{$this->getDireccion()}',ciudad='{$this->getCiudad()}';";
		
		if($this->getImagen() != null){
			$sql .= ", imagen='{$this->getImagen()}'";
		}
		
		$sql .= " WHERE id={$this->id};";
		
		
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	
	public function delete(){
		$sql = "DELETE FROM pacientes WHERE id={$this->id}";
		$delete = $this->db->query($sql);
		
		$result = false;
		if($delete){
			$result = true;
		}
		return $result;
	}
	
}