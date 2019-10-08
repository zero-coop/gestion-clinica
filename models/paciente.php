<?php

class Paciente
{
	private $id;
	private $id_obra;
	private $apellido;
	private $nombre;
	private $dni;
	private $sexo;
	private $telefono;
	private $direccion;
	private $provincia;
	private $fecha;
	private $imagen;

	private $db;

	public function __construct()
	{
		$this->db = Database::connect();
	}

	function getId()
	{
		return $this->id;
	}

	function getIdObra()
	{
		return $this->id_obra;
	}

	function getApellido()
	{
		return $this->apellido;
	}

	function getNombre()
	{
		return $this->nombre;
	}

	function getDni()
	{
		return $this->dni;
	}

	function getSexo()
	{
		return $this->sexo;
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


	function getFecha()
	{
		return $this->fecha;
	}

	function getImagen()
	{
		return $this->imagen;
	}

	///////////////////////////////////////////////////////////////////////////////////////////

	function setId($id) //realy??? es AI
	{
		$this->id = $id;
	}

	function setIdObra($id_obra)
	{
		$this->id_obra = $id_obra;
	}

	function setApellido($apellido)
	{
		$this->apellido = $this->db->real_escape_string($apellido);
	}

	function setNombre($nombre)
	{
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	function setDni($dni)
	{
		$this->dni = $this->db->real_escape_string($dni);
	}

	function setSexo($sexo)
	{
		$this->sexo = $this->db->real_escape_string($sexo);
	}

	function setTelefono($telefono)
	{
		$this->telefono = $this->db->real_escape_string($telefono);
	}

	function setDireccion($direccion)
	{
		$this->direccion = $this->db->real_escape_string($direccion);
	}

	function setProvincia($provincia)
	{
		$this->provincia = $provincia;
	}

	function setFecha($fecha)
	{
		$this->fecha = $fecha;
	}

	function setImagen($imagen)
	{
		$this->imagen = $imagen;
	}

	public function getAll()
	{
		$pacientes = $this->db->query("SELECT * FROM pacientes ORDER BY id_paciente ASC");
		return $pacientes;
	}

	public function getAllDoctor()
	{
		$sql = "SELECT pacientes.*, doctores.nombreyApellido FROM pacientes"
			. "INNER JOIN doctores ON doctores.id = pacientes.doctor_id "
			. "WHERE pacientes.doctor_id = {$this->getDoctor_id()} "
			. "ORDER BY id DESC";
		$pacientes = $this->db->query($sql);
		return $pacientes;
	}

	public function getRandom($limit)
	{
		$pacientes = $this->db->query("SELECT * FROM pacientes ORDER BY RAND() LIMIT $limit");
		return $pacientes;
	}

	public function getOne()
	{
		$paciente = $this->db->query("SELECT * FROM pacientes WHERE id = {$this->getId()}");
		return $paciente->fetch_object();
	}

	public function save()
	{
		$sql = "INSERT INTO pacientes VALUES(NULL, '{$this->getNombre()}', '{$this->getApellido()}', '{$this->getDni()}', '{$this->getSexo()}','{$this->getTelefono()}', '{$this->getDireccion()}', '1', NULL, '0');";
		$save = $this->db->query($sql);
		$insert = "INSERT INTO pacientesxobrasociales VALUES(NULL, (SELECT MAX(id_paciente) FROM pacientes), {$this->getIdObra()},null)";
		$save2 = $this->db->query($insert);




		$result = false;
		if ($save && $save2) {
			$result = true;
		}
		return $result;
	}

	public function edit()
	{
		$sql = "UPDATE pacientes SET nombre='{$this->getNombreyApellido()}', descripcion='{$this->getDescripcion()}', sexo='{$this->getSexo()}', telefono={$this->getTelefono()}, direccion='{$this->getDireccion()}',ciudad='{$this->getCiudad()}';";

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

	public function delete()
	{
		$sql = "DELETE FROM pacientes WHERE id_paciente={$this->id}";
		$delete = $this->db->query($sql);

		$result = false;
		if ($delete) {
			$result = true;
		}
		return $result;
	}
}
