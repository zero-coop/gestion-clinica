<?php

class PacientesModel
{
	private $id_paciente;
	private $nombre;
	private $apellido;
	private $cuil;
	private $sexo;
	private $telefono;
	private $direccion;
	private $provincia;
    private $hijos;
	private $historia_clinica;
	
	private $conexion;

	public function __construct()
	{
		$this->conexion = Database::conexion();
    }
	
	
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function setApellido($apellido){
		$this->apellido = $apellido;
	}

	public function setCuil($cuil){
		$this->cuil = $cuil;
	}

	public function setSexo($sexo){
		$this->sexo = $sexo;
	}

	public function setTelefono($telefono){
		$this->telefono = $telefono;
	}

	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}

	public function setProvincia($provincia){
		$this->provincia = $provincia;
	}

	public function setHijo($hijos){
		$this->hijos = $hijos;
	}

	public function setHistoria($historia){
		$this->historia_clinica = $historia;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function getApellido(){
		return $this->apellido;
	}

	public function getCuil(){
		return $this->cuil;
	}

	public function getSexo(){
		return $this->sexo;
	}

	public function getTelefono(){
		return $this->telefono;
	}

	public function getDireccion(){
		return $this->direccion;
	}

	public function getProvincia(){
		return $this->provincia;
	}

	public function getHijo(){
		return $this->hijos;
	}

	public function getHistoria(){
		return $this->historia_clinica;
	}


	public function guardar(){
		$sql = "INSERT INTO pacientes VALUES (NULL, '{$this->getNombre()}', '{$this->getApellido()}', '{$this->getCuil()}', '{$this->getSexo()}', '{$this->getTelefono()}', '{$this->getDireccion()}', {$this->getProvincia()}, NULL, {$this->getHistoria()});";
		echo $sql;
		$save = $this->conexion->query($sql);
		
		$result = false;

		if($save){
			$result = true;
		}
		return $result;
	}

	public function getAll(){
		$pacientes = $this->conexion->query("SELECT * FROM pacientes");
		return $pacientes;
	}

    
}
