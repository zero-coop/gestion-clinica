<?php

class Doctor{
	private $id_medico;
	private $nombre;
	private $apellido;
	private $dni;
	private $especialidad;
	private $matricula;
	private $domicilio;
	private $telefono;
	private $celular;
	private $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}
	
	function getId_medico() {
		return $this->id_medico;
	}

	function getNombre() {
		return $this->nombre;
	}

	function getApellido() {
		return $this->apellido;
	}

	function getDni() {
		return $this->dni;
	}
	
	function getEspecialidad() {
		return $this->especialidad;
	}

	function getMatricula() {
		return $this->matricula;
	}

	function getDomicilio() {
		return $this->domicilio;
	}

	function getTelefono() {
		return $this->telefono;
	}	

	function getCelular() {
		return $this->celular;
	}

	function setId_medico($id_medico) {
		$this->id_medico = $id;
	}

	function setNombre($nombre) {
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	function setApellido($apellido) {
		$this->apellido = $this->db->real_escape_string($apellido);
	}

	function setDni($dni) {
		$this->dni = $this->db->real_escape_string($dni);
	}

	function setEspecialidad($especialidad) {
		$this->especialidad = $this->db->real_escape_string($especialidad);
	}

	function setMatricula($matricula) {
		$this->matricula = $this->db->real_escape_string($matricula);
	}

	function setDomicilio($domicilio) {
		$this->domicilio = $this->db->real_escape_string($domicilio);
	}

	function setTelefono($telefono) {
		$this->telefono = $this->db->real_escape_string($telefono);
	}

	function setCelular($celular) {
		$this->celular = $this->db->real_escape_string($celular);
	}

	public function getAll(){
		$medicos = $this->db->query("SELECT * FROM medicos ORDER BY id_medico DESC;");
		return $medicos;
	}
	
	public function getOne(){
		$medico = $this->db->query("SELECT * FROM medicos WHERE id_medico={$this->getId_medico()}");
		return $medico->fetch_object();
	}
	
	public function save(){
		$sql = "INSERT INTO medicos VALUES(NULL, '{$this->getNombre()}', '{$this->getApellido()}', '{$this->getDni()}',{$this->getEspecialidad()},'{$this->getMatricula()}','{$this->getDomicilio()}, '{$this->getTelefono()}, '{$this->getCelular()}');";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

	public function edit(){
		$sql = "UPDATE medicos SET nombreyApellido='{$this->getNombreyApellido()}', '{$this->getEspecialidad()}', telefono={$this->getTelefono()}, direccion='{$this->getDireccion()}', ciudad='{$this->getCiudad()}' WHERE id=$this->id";
		
		
		// $sql .= " WHERE id={$this->id};";
		
		
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

	public function delete(){
		$sql = "DELETE FROM medicos WHERE id={$this->id}";
		$delete = $this->db->query($sql);
		
		$result = false;
		if($delete){
			$result = true;
		}
		return $result;
	}
	
	
}