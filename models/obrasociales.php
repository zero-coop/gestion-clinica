<?php

class ObraSocial
{
    private $id_obrasociales;
    private $nombre;
    private $cuit;
    private $correo;
    private $telefono;
    private $direccion;
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

    function getDireccion()
	{
		return $this->direccion;
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

    
    function setId($id) 
	{
		  $this->id_obrasociales = $id;
    }
    
    function setNombre($nombre)
	{
		$this->nombre = $this->db->real_escape_string($nombre);
    }
    
    function setCuit($cuit)
	{
		$this->cuit = $this->db->real_escape_string($cuit);
    }

    function setCorreo($correo)
	{
		$this->correo = $this->db->real_escape_string($correo);
    }

    function setTelefono($telefono)
	{
		$this->telefono = $this->db->real_escape_string($telefono);
    }

    function setDireccion($direccion){
		  $this->direccion = $this->db->real_escape_string($direccion);
    }
    
    function setProvincia($provincia){
		  $this->provincia = $this->db->real_escape_string($provincia);
    }

    function setDescuento($descuento){
		  $this->descuento = $this->db->real_escape_string($descuento);
    }

    function setFecha($fecha){
		  $this->fecha = $this->db->real_escape_string($fecha);
    }
    
    public function getAll(){
      $obrasociales = $this->db->query("SELECT * FROM obras_sociales ORDER BY id_obrasociales DESC;");
      return $obrasociales;
    }

    public function getOne()
    {
      $obrasocial = $this->db->query("SELECT * FROM obras_sociales WHERE id_obrasociales = {$this->getId_obrasociales()}");
      return $obrasocial->fetch_object();
    }

    public function getObraSocial($id_paciente)
    {
      $sql = "SELECT * FROM obras_sociales WHERE id_obrasociales = (SELECT id_obra_social FROM pacientesxobrasociales WHERE id_paciente = $id_paciente);";
      $result = $this->db->query($sql);
      $r = $result->fetch_object();
      return $r;
    }

    public function ObraExiste($cuit){
      $result = $this->db->query("SELECT cuit FROM obras_sociales WHERE cuit = $cuit");
      return $result;
    }

    public static function getNumeroObraSocial($id_paciente)
    {
      $db = Database::connect();
      $sql = "SELECT numero_socio FROM pacientesxobrasociales WHERE id_paciente = $id_paciente;";
      $result = $db->query($sql);
      $r = $result->fetch_object();
      return $r;
    }

    

    public function save()
	{
		$sql = "INSERT INTO obras_sociales VALUES (NULL, '{$this->getNombre()}', '{$this->getCuit()}', '{$this->getCorreo()}', {$this->getTelefono()}, 1,'{$this->getDireccion()}',{$this->getProvincia()},{$this->getDescuento()},CURTIME())";
    $save = $this->db->query($sql);
		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
	}

	public function edit()
	{
		$sql = "UPDATE obras_sociales SET nombre='{$this->getNombre()}', cuit='{$this->getCuit()}', correo='{$this->getCorreo()}', telefono='{$this->getTelefono()}', direccion='{$this->getDireccion()}',provincia='{$this->getProvincia()}' WHERE id_obrasociales={$this->getId_obrasociales()};";

		$save = $this->db->query($sql);
		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
	}

	public function delete(){

		$sql = "UPDATE obras_sociales SET habilitado='0' WHERE id_obrasociales={$this->id_obrasociales}";
		$delete = $this->db->query($sql);
		
		$result = false;
		if ($delete){
			$result = true;
		}
		return $result;
  }
  
  public function habiliar(){

		$sql = "UPDATE obras_sociales SET habilitado='1' WHERE id_obrasociales={$this->id_obrasociales}";
		$update = $this->db->query($sql);
		
		$result = false;
		if ($update){
			$result = true;
		}
		return $result;
	}
  }