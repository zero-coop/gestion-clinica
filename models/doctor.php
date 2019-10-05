<?php

class Doctor{
	private $id;
	private $nombreyApellido;
	private $especialidad;
	private $telefono;
	private $direccion;
	private $ciudad;
	private $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}
	
	function getId() {
		return $this->id;
	}

	function getNombreyApellido() {
		return $this->nombreyApellido;
	}

	function getEspecialidad() {
		return $this->especialidad;
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

	function setId($id) {
		$this->id = $id;
	}

	function setNombreyApellido($nombreyApellido) {
		$this->nombreyApellido = $this->db->real_escape_string($nombreyApellido);
	}

	function setEspecialidad($especialidad) {
		$this->especialidad = $this->db->real_escape_string($especialidad);
	}

	function setTelefono($telefono) {
		$this->telefono = $this->db->real_escape_string($telefono);
	}

	function setDireccion($direccion) {
		$this->direccion = $this->db->real_escape_string($direccion);
	}

	function setCiudad($ciudad) {
		$this->ciudad = $this->db->real_escape_string($ciudad);
	}

	public function getAll(){
		$doctores = $this->db->query("SELECT * FROM doctores ORDER BY id DESC;");
		return $doctores;
	}
	
	public function getOne(){
		$doctor = $this->db->query("SELECT * FROM doctores WHERE id={$this->getId()}");
		return $doctor->fetch_object();
	}
	
	public function save(){
		$sql = "INSERT INTO doctores VALUES(NULL, '{$this->getNombreyApellido()}', '{$this->getEspecialidad()}',{$this->getTelefono()},'{$this->getDireccion()}','{$this->getCiudad()}');";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

	public function edit(){
		$sql = "UPDATE doctores SET nombreyApellido='{$this->getNombreyApellido()}', '{$this->getEspecialidad()}', telefono={$this->getTelefono()}, direccion='{$this->getDireccion()}', ciudad='{$this->getCiudad()}' WHERE id=$this->id";
		
		
		// $sql .= " WHERE id={$this->id};";
		
		
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

	public function delete(){
		$sql = "DELETE FROM doctores WHERE id={$this->id}";
		$delete = $this->db->query($sql);
		
		$result = false;
		if($delete){
			$result = true;
		}
		return $result;
	}
	
	
}