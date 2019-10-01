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
	
	public function getAll(){
		$pacientes = $this->conexion->query("SELECT * FROM pacientes");
		// var_dump($pacientes);
		return $pacientes;
	}
    
}
