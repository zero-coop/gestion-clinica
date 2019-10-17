<?php

class Database{
	public static function connect(){
		$db = new mysqli('localhost', 'root', '', 'clinica');
		$db->query("SET NAMES 'utf8'");
		return $db;
	}

	public static function query($sql){
		$db = new mysqli('localhost', 'root', '', 'clinica');
		$db->query("$sql");
		//return $db;
	}
}

