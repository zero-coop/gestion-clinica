<?php 
	
	class Model
	{
		private $database;
		
		public function __construct()
		{
			$this->database = new Database();
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
