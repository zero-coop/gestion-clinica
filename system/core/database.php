<?php

class Database
{
	public static function connect()
	{
		$db = new PDO ("mysql:host=HOST;dbname=DB","USER","PASSWORD");
		//$db->query("SET NAMES 'utf8'");
		return $db;
	}
}
