<?php

class UserModel
{
	private $id;
	private $nombre;
	private $apellidos;
	private $email;
	private $password;
	private $usuario;
	private $rol;
	private $imagen;
	private $db;
	private $conexion;

	public function __construct()
	{
		$this->conexion = Database::conexion();
	}

	public function setPassword($pass){
		$this->password = $pass;
	}

	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}


	public function save()
	{
		$sql = "INSERT INTO usuarios VALUES(NULL, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}', 'user', null);";
		$save = $this->db->query($sql);

		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
	}

	public function login()
	{
		$statement = $this->conexion->prepare('SELECT * FROM usuarios WHERE nombre_usuario = :usuario AND password = :password');

		$statement->execute(array(
			':usuario' => $this->usuario,
			':password' => $this->password
		));
		
		$resultado = $statement->fetch();

		if ($resultado !== false) {
			$_SESSION['usuario'] = $this->usuario;
			return true;
		} else {
			return false;
		}


		// $result = false;
		// $email = $this->email;
		// $password = $this->password;

		// $sql = "SELECT * FROM usuarios WHERE email = '$email'";
		// $login = $this->db->query($sql);

		// if ($login && $login->num_rows == 1) {
		// 	$usuario = $login->fetch_object();
		// 	$verify = password_verify($password, $usuario->password);

		// 	if ($verify) {
		// 		$result = $usuario;
		// 	}
		// }
		// return $result;
	}

	public function userExist($email){
		$email = $this->db->real_escape_string($email);
		$sql = "SELECT * FROM usuarios WHERE email = '$email'";
        return ($this->db->query($sql));
	}


}
