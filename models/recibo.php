<?php

class Recibo{
    private $id;
    private $id_metodos_pago;
    private $id_orden_atencion;
    private $monto;
    private $fecha;
    private $db;

	public function __construct()
	{
		$this->db = Database::connect();
    }
    
    function getId()
	{
		return $this->id;
	}

	function getIdMetodosPago()
	{
		return $this->id_metodos_pago;
	}
	function getIdOrdenAtencion()
	{
		return $this->id_orden_atencion;
	}

	function getMonto()
	{
		return $this->monto;
	}

	function getFecha()
	{
		return $this->fecha;
    }
    
    function setId($id)
	{
		$this->id = $id;
	}

	function setIdMetodosPago($id_metodos_pago)
	{
		$this->id_metodos_pago = $this->db->real_escape_string($id_metodos_pago);
	}
	function setIdOrdenAtencion($id_orden_atencion)
	{
		$this->id_orden_atencion = $this->db->real_escape_string($id_orden_atencion);
	}

	function setMonto($monto)
	{
		$this->monto = $this->db->real_escape_string($monto);
	}

	function setFecha($fecha)
	{
		$this->fecha = $this->db->real_escape_string($fecha);
	}

	public function getAll()
	{
		$recibos = $this->db->query("SELECT * FROM recibos ORDER BY id DESC");
		return $recibos;
	}
	public function getInicio()
	{
		$recibos = $this->db->query("SELECT recibos.id as id,ordenes_atencion.id_orden_atencion as id_orden,medicos.apellido AS medicoapellido,medicos.nombre AS mediconombre,pacientes.apellido AS pacienteapellido,pacientes.nombre AS pacientenombre,recibos.monto,recibos.fecha,servicios.descripcion,metodos_pago.metodo FROM recibos INNER JOIN ordenes_atencion ON recibos.id_orden_atencion=ordenes_atencion.id_orden_atencion INNER JOIN medicos ON medicos.id_medico=ordenes_atencion.id_medico INNER JOIN servicios ON servicios.id_servicio=ordenes_atencion.id_servicio INNER JOIN metodos_pago ON metodos_pago.id_metodo_pago=recibos.id_metodos_pago inner join pacientesxobrasociales ON pacientesxobrasociales.id_pacientexobrasocial=ordenes_atencion.id_pacientexobrasocial INNER JOIN pacientes ON pacientes.id_paciente=pacientesxobrasociales.id_paciente");
		return $recibos;
	}
	public function getRecargo($metodo)
	{
		$recargo = $this->db->query("SELECT * FROM metodos_pago WHERE id_metodo_pago=$metodo");
		return $recargo;
	}
	public function detalleRegistro($id)
	{
		$detalle = $this->db->query("SELECT recibos.id as id,ordenes_atencion.id_orden_atencion as id_orden,medicos.apellido AS medicoapellido,medicos.nombre AS mediconombre,pacientes.apellido AS pacienteapellido,pacientes.nombre AS pacientenombre,recibos.monto,recibos.fecha,ordenes_atencion.fecha AS fechaorden,ordenes_atencion.descripcion AS observacion,servicios.descripcion,metodos_pago.metodo FROM recibos INNER JOIN ordenes_atencion ON recibos.id_orden_atencion=ordenes_atencion.id_orden_atencion INNER JOIN medicos ON medicos.id_medico=ordenes_atencion.id_medico INNER JOIN servicios ON servicios.id_servicio=ordenes_atencion.id_servicio INNER JOIN metodos_pago ON metodos_pago.id_metodo_pago=recibos.id_metodos_pago inner join pacientesxobrasociales ON pacientesxobrasociales.id_pacientexobrasocial=ordenes_atencion.id_pacientexobrasocial INNER JOIN pacientes ON pacientes.id_paciente=pacientesxobrasociales.id_paciente AND recibos.id=$id");
		return $detalle;
	}
	
	public function save(){
		$sql = "INSERT INTO recibos VALUES(NULL, {$this->getIdMetodosPago()}, {$this->getIdOrdenAtencion()}, {$this->getMonto()},CURTIME());";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

	public function getSetearId($id_pedido){
		$recibos = $this->db->query("SELECT ordenes_atencion.id_orden_atencion FROM ordenes_atencion WHERE id_orden_atencion=$id_pedido");
		return $recibos;
	}

	public function mostrarOrdenCompleta($id_orden){
		$todo = $this->db->query("SELECT ordenes_atencion.id_orden_atencion,obras_sociales.nombre AS obra,medicos.nombre AS mediconombre,medicos.apellido AS medicoapellido,medicos.especialidad,pacientes.nombre AS pacientenombre,pacientes.apellido AS pacienteapellido,pacientes.dni,servicios.descripcion,ordenes_atencion.fecha,ordenes_atencion.precio FROM pacientes INNER JOIN pacientesxobrasociales on pacientes.id_paciente=pacientesxobrasociales.id_pacientexobrasocial INNER JOIN obras_sociales ON obras_sociales.id_obrasociales=pacientesxobrasociales.id_obra_social INNER JOIN ordenes_atencion ON pacientesxobrasociales.id_pacientexobrasocial=ordenes_atencion.id_pacientexobrasocial INNER JOIN servicios ON ordenes_atencion.id_servicio=servicios.id_servicio INNER JOIN medicos ON ordenes_atencion.id_medico=medicos.id_medico AND ordenes_atencion.id_orden_atencion=$id_orden");
		return $todo;
		
	}
	
	public function getDescObra($id_orden){
		$descobra = $this->db->query("SELECT obras_sociales.descuento FROM obras_sociales INNER JOIN pacientesxobrasociales ON obras_sociales.id_obrasociales=pacientesxobrasociales.id_obra_social INNER JOIN ordenes_atencion ON pacientesxobrasociales.id_pacientexobrasocial=ordenes_atencion.id_pacientexobrasocial AND ordenes_atencion.id_orden_atencion=$id_orden");
		return $descobra;
		
	}

	public function getReciboTerminado($id_orden){
		$recibo = $this->db->query("SELECT recibos.id,recibos.fecha,ordenes_atencion.id_orden_atencion,servicios.descripcion, pacientes.apellido,pacientes.nombre,pacientes.dni,recibos.monto,metodos_pago.metodo FROM recibos INNER JOIN metodos_pago ON metodos_pago.id_metodo_pago=recibos.id_metodos_pago INNER JOIN ordenes_atencion ON ordenes_atencion.id_orden_atencion=recibos.id_orden_atencion INNER JOIN servicios ON servicios.id_servicio=ordenes_atencion.id_servicio INNER JOIN pacientesxobrasociales ON pacientesxobrasociales.id_pacientexobrasocial=ordenes_atencion.id_pacientexobrasocial INNER JOIN pacientes ON pacientes.id_paciente=pacientesxobrasociales.id_paciente AND recibos.id_orden_atencion=$id_orden ORDER BY recibos.id DESC LIMIT 1;");
		return $recibo;
	}
	
	public function eliminar($id){
		$eliminar = $this->db->query("DELETE FROM ordenes_atencion WHERE id_orden_atencion=$id");
		return $eliminar;
		
	}




}