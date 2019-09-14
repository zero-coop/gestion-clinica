<?php

class Database
{
	private $host = HOST;
	private $db = DB;
	private $user = USER;
	private $pass = PASSWORD;

	public function conexion()
	{
		try {
			$conexion = new PDO('mysql:host=localhost;dbname=clinica', 'root', '');
			return $conexion;
		} catch (PDOException $e) {
			echo "Error:" . $e->getMessage();
		} 
	}


}
