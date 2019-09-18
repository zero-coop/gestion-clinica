<?php

class Database
{
	private $host = HOST;
	private $db = DB;
	private $user = USER;
	private $pass = PASSWORD;
	private $statement;
	private $dbh;

	public function conexion()
	{
		try {
			$conexion = new PDO('mysql:host=localhost;dbname=clinica', 'root', '');
			return $conexion;
		} catch (PDOException $e) {
			echo "Error:" . $e->getMessage();
		} 
	}

	public function query($sql){
		$this->statement = $this->statement->dbh->prepare($sql);
	}

		//ejecutar consulta
	public function execute(){
		return $this->statement->execute();
	}

	//obtener un registro
	public function registroUnico(){
		$this->execute();
		return $this->statement->fetch(PDO::FETCH_OBJ);
	}

}
