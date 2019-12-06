<?php

class Paciente
{
	private $id;
	private $id_obra;
	private $numero_afiliado;
	private $apellido;
	private $nombre;
	private $fecha_nacimiento;
	private $dni;
	private $sexo;
	private $telefono;
	private $direccion;
	private $provincia;
	private $grupo_sanguineo;
	private $fecha;
	private $habilitado;
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

	function getNumeroAfiliado()
	{
		return $this->numero_afiliado;
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

	function getFechaNacimiento(){
		return $this->fecha_nacimiento;
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

	function getGrupoSanguineo()
	{
		return $this->grupo_sanguineo;
	}

	function getFecha()
	{
		return $this->fecha;
	}

	function getHabilitado()
	{
		return $this->habilitado;
	}

	function getImagen()
	{
		return $this->imagen;
	}


	function setId($id) 
	{
		$this->id = $id;
	}

	function setIdObra($id_obra)
	{
		$this->id_obra = $id_obra;
	}

	function setNumeroAfiliado($id)
	{
		$this->numero_afiliado = $id;
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

	function setFechaNacimiento($fecha)
	{
		$this->fecha_nacimiento = $this->db->real_escape_string($fecha);
	}

	function setSexo($sexo)
	{
		$this->sexo = $this->db->real_escape_string($sexo);
	}

	function setGrupoSanguineo($grupo_sanguineo){
		$this->grupo_sanguineo = $this->db->real_escape_string($grupo_sanguineo);
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

	function setHabilitado($habilitado)
	{
		$this->habilitado = $habilitado;
	}

	function setImagen($imagen)
	{
		$this->imagen = $imagen;
	}

	public function getAll()
	{
		$pacientes = $this->db->query("SELECT * FROM pacientes ORDER BY id_paciente DESC");
		return $pacientes;
	}
	public function getNpacientes()
	{
		$npacientes = $this->db->query("SELECT COUNT(nombre) AS numero FROM pacientes");
		return $npacientes;
	}
	public function getAllMedic()
	{
		$pacientes = $this->db->query("SELECT COUNT(nombre) as numero FROM medicos");
		return $pacientes;
	}
	public function getAllPed()
	{
		$pedidos = $this->db->query("SELECT COUNT(id_orden_atencion) as numero FROM ordenes_atencion ");
		return $pedidos;
	}
	public function getIngresos()
	{
		$ingresos = $this->db->query("SELECT SUM(monto) as total FROM recibos");
		return $ingresos;
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
		$paciente = $this->db->query("SELECT * FROM pacientes WHERE id_paciente = {$this->getId()}");
		return $paciente->fetch_object();
	}

	public function pacienteExiste($dni){
		$result = $this->db->query("SELECT dni FROM pacientes WHERE dni = $dni");
		return $result;
	}

	public function getUltimoPaciente(){
		$db = Database::connect();
		$sql = "SELECT * FROM pacientes WHERE id_paciente=(SELECT MAX(id_paciente) FROM pacientes)";
		$result = $db->query($sql);
		return $result->fetch_object();
	}

	public function save()
	{
		$sql = "INSERT INTO pacientes VALUES(NULL, '{$this->getNombre()}', '{$this->getApellido()}', '{$this->getDni()}', '{$this->getGrupoSanguineo()}', '{$this->getSexo()}','{$this->getTelefono()}', '{$this->getDireccion()}', '{$this->getProvincia()}', NULL, '0', '{$this->getFechaNacimiento()}', 1);";
		$save = $this->db->query($sql);
		$insert = "INSERT INTO pacientesxobrasociales VALUES(NULL, (SELECT MAX(id_paciente) FROM pacientes), {$this->getIdObra()},'{$this->getNumeroAfiliado()}')";
		$save2 = $this->db->query($insert);

		$result = false;
		if ($save && $save2) {
			$result = true;
		}
		return $result;
	}

	public function edit()
	{
		$sql = "UPDATE pacientes SET nombre='{$this->getNombre()}', apellido='{$this->getApellido()}', dni='{$this->getDni()}', grupo_sanguineo='{$this->getGrupoSanguineo()}', sexo='{$this->getSexo()}', telefono={$this->getTelefono()}, direccion='{$this->getDireccion()}',provincia='{$this->getProvincia()}', hijos=NULL, historia_clinica=0, fecha_nacimiento ='{$this->getFechaNacimiento()}' WHERE id_paciente={$this->id};";

		if ($this->getImagen() != null) {
			$sql .= ", imagen='{$this->getImagen()}'";
		}

		$save = $this->db->query($sql);

		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
	}

	public function delete(){

		$sql = "UPDATE pacientes SET habilitado='0' WHERE id_paciente={$this->id}";
		$delete = $this->db->query($sql);
		
		$result = false;
		if ($delete){
			$result = true;
		}
		return $result;
	}

	public function habiliar(){

		$sql = "UPDATE pacientes SET habilitado='1' WHERE id_paciente={$this->id}";
		$update = $this->db->query($sql);
		
		$result = false;
		if ($update){
			$result = true;
		}
		return $result;
	}

	public function historia($id){
		$historias = $this->db->query("SELECT dni FROM pacientes WHERE dni = $dni");
		return $historias;
	}
}
