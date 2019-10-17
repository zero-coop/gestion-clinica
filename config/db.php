<?php

class Database{

	public function connect(){
		$db = new mysqli('localhost', 'root', '', 'clinica');
		$db->query("SET NAMES 'utf8'");
		return $db;
	}

	/* public static function query($sql){
		//$db = new mysqli('localhost', 'root', '', 'clinica');
		$this->connect->db->query;
		//return $r;

		
	} */
}

