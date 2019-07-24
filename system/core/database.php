<?php

class Database
{
	public static function connect()
	{
		$db = new mysqli(HOST, USER, PASSWORD, DB);
		$db->query("SET NAMES 'utf8'");
		return $db;
	}
}
