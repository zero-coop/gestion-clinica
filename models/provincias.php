<?php

class Provincias
{
    private $id;
    private $nombre;
    private $cp;
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
    
    function getCp()
	{
		return $this->cp;
    }

    public function getAll(){
        $provincias = $this->db->query("SELECT * FROM provincias ORDER BY id_provincia ASC;");
        return $provincias;
    }
}