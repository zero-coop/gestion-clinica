<?php

class Database{

	public function connect(){
		$db = new mysqli('localhost', 'root', '', 'clinica');
		$db->query("SET NAMES 'utf8'");
		return $db;
	}


}

