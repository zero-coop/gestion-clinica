<?php 

	defined('BASEPATH') or exit('No se permite acceso directo');
	
	class Model
	{
		protected $conexiondb;
		protected $table;


		public function __construct()
		{
            $this->conexiondb=new mysqli(HOST, USER, PASSWORD, DB);
        	if($this->conexiondb->connect_error){
		        die("Ocurrió un error al intentar conectar la db");
			}
		}

		public function getBy($column, $value){
			$sql=$this->conexiondb->query("SELECT * FROM $this->table WHERE $column='$value'");
			while($row = $sql->fetch_object()) {
			   $resultSet[]=$row;
			}
			return $resultSet;
		}
	
		public function getById($id){
			$sql=$this->conexiondb->query("SELECT * FROM $this->table WHERE id=$id");
	 
			if($row = $sql->fetch_object()) {
			   $resultSet=$row;
			}
			return $resultSet;
		}
	
	}
