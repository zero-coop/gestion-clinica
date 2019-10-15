<?php

class GrupoSanguineo
{
    private $id;
    private $nombre;
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

    public function getAll(){
        $grupo = $this->db->query("SELECT * FROM grupo_sanguineo ORDER BY id_grupo ASC;");
        return $grupo;
    }
}