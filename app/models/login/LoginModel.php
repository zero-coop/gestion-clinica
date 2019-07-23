<?php 
	class LoginModel extends Model
	{
		//private $table;
		public function __construct()
		{
			parent::__construct();
		}

		public function sigIn($nUser)
		{
			$user = $this->conexiondb->real_escape_string($nUser);
			$sql = "SELECT * FROM usuarios WHERE usuario = '{$user}'";
			return $this->conexiondb->query($sql);
		}
	}
?>