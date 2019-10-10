<?php

class ObraSocial
{
    private $id_obrasociales;
    private $nombre;
    private $cuit;
    private $correo;
    private $telefono;
    private $domicilio;
    private $provincia;
    private $descuento;
    private $fecha;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    function getId_obrasociales()
	{
		return $this->id_obrasociales;
    }
     
    function getNombre()
	{
		return $this->nombre;
    }
    
    function getCuit()
	{
		return $this->cuit;
    }

    function getCorreo()
	{
		return $this->correo;
    }

    function getTelefono()
	{
		return $this->telefono;
    }

    function getDomicilio()
	{
		return $this->domicilio;
    }

    function getProvincia()
	{
		return $this->provincia;
    }

    function getDescuento()
	{
		return $this->descuento;
    }

    function getFecha()
	{
		return $this->fecha;
    }

    
    function setId_obrasociales() 
	{
		return $this->id_obrasociales;
    }
    
    function setNombre($nombre)
	{
		$this->nombre = $this->db->real_escape_string($nombre);
    }
    
    function setCuit()
	{
		$this->cuit = $this->db->real_escape_string($cuit);
    }

    function setCorreo()
	{
		$this->corre = $this->db->real_escape_string($correo);
    }

    function setTelefono()
	{
		$this->telefono = $this->db->real_escape_string($telefono);
    }

    function setDomicilio(){
		  $this->domicilio = $this->db->real_escape_string($domicilio);
    }
    
    function setProvincia(){
		  $this->provincia = $this->db->real_escape_string($provincia);
    }

    function setDescuento(){
		  $this->descuento = $this->db->real_escape_string($descuento);
    }

    function setFecha(){
		  $this->fecha = $this->db->real_escape_string($fecha);
    }
    
    public function getAll(){
      $obrasociales = $this->db->query("SELECT * FROM obras_sociales ORDER BY id_obrasociales DESC;");
      return $obrasociales;
    }

    public function getOne()
    {
        $obrasocial = $this->db->query("SELECT * FROM obras_sociales WHERE id = {$this->getId_obrasociales()}");
    }
    public function getObraSocial($id_paciente)
    {
      $sql = "SELECT * FROM obras_sociales WHERE id_obrasociales = (SELECT id_obra_social FROM pacientesxobrasociales WHERE id_paciente = $id_paciente);";
      //echo $sql; 
      $result = $this->db->query($sql);
      $r = $result->fetch_object();
      return $r;
    }
    public function save()
	{
		$sql = "INSERT INTO obras_sociales VALUES(NULL, '{$this->getNombre()}', '{$this->getCuit()}', '{$this->getDireccion()}', {$this->getProvincia()},'{$this->getDescuento()}',CURTIME();";
		$save = $this->db->query($sql);

		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
	}

	public function edit()
	{
		$sql = "UPDATE obras_sociales SET nombre='{$this->getNombre()}', cuit='{$this->getCuit()}', correo='{$this->getCorreo()}', telefono={$this->getTelefono()}, direccion='{$this->getDireccion()}',provincia='{$this->getProvincia()}';";

		if ($this->getImagen() != null) {
			$sql .= ", imagen='{$this->getImagen()}'";
		}

		$sql .= " WHERE id={$this->id};";


		$save = $this->db->query($sql);

		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
	}

	public function delete(){

		$sql = "DELETE FROM obras_sociales WHERE id_obrasociales={$this->id_obrasociales}";
		$delete = $this->db->query($sql);
		
		$result = false;
		if ($delete){
			$result = true;
		}
		return $result;
	}
  }