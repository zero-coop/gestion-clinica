<?php

class Database
{
	public static function conexion()
	{
		$db = new mysqli(HOST, USER, PASSWORD, DB);
		if ($db->connect_error){
			die ("ERROr EN LA CONEXION A LA DB");
		}
		$db->query("SET NAMES 'utf8'");
		return $db;
	}
}
