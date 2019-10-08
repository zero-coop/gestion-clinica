<?php

class ObraSocial
{
    private $id;
    private $nombre;
    private $cuit;
    private $correo;
    private $telefono;
    private $domicilio;
    private $provincia;
    private $descuento;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    function getId()
	{
		return $this->id;
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

    public function getAll(){
      $obras = $this->db->query("SELECT * FROM obras_sociales ORDER BY id_obrasociales DESC;");
      return $obras;
    }

    public function getOne()
    {
        $obrasocial = $this->db->query("SELECT * FROM obras_sociales WHERE id = {$this->getId()}");
    }

    function setId() //realy??? es AI ?????
	{
		return $this->id;
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
    
    public function getObraSocial($id_paciente)
    {
      $sql = "SELECT * FROM obras_sociales WHERE id_obrasociales = (SELECT id_obra_social FROM pacientesxobrasociales WHERE id_paciente = $id_paciente);";
      //echo $sql; 
      $result = $this->db->query($sql);
      $r = $result->fetch_object();
      return $r;
    }
}