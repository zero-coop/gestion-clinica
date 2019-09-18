<?php

class MedicoModel
{
	private $id;
	private $nombre;
    private $apellidos;
    private $telefono;
    private $direccion;
	private $especialidad;
	private $imagen;
	private $db;
    private $conexion;

    public function __construct()
	{
		$this->conexion = Database::conexion();
    }

    public function getId($id){
		$this->db->query('SELECT * FROM medico WHERE id = :id');
		$this->db->bind(':id', $id);

		$fila = $this->database->registroUnico();

		return $fila;	
	}

    
    public function agregarMedico($datos){
        
        $this->database->query('INSERT INTO medico (nombre,apellidos,telefono,direccion,especialidad)');

        $this->database($data['nombre']);
        $this->database($data['apellidos']);
        $this->database($data['telefono']);
        $this->database($data['direccion']);
        $this->database($data['especialidad']);

        //Ejecutar
		if($this->database->execute()){
			return true;
		}else{
			return false;
		}
        
    }

    public function editarMedico($id){
		$this->database->query('UPDATE medico SET nombre,apellidos,telefono,direccion,especialidad WHERE id = $id');
		
        $this->database($data['nombre']);
        $this->database($data['apellidos']);
        $this->database($data['telefono']);
        $this->database($data['direccion']);
        $this->database($data['especialidad']);	

		//Ejecutar
		if($this->database->execute()){
			return true;
		}else{
			return false;
		}
    }
    
    public function eliminarMedico($data){
	    $this->database->query('DELETE FROM medico WHERE id = :$id');

		$this->database(':id', $data['id']);

		if($this->database->execute()){
		    return true;
		}else{
		    return false;
		}
	
	}


}