<?php
require_once PATH_MODELS . 'UserModel.php';

class Login extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function exec()
	{
		$this->view->render(__CLASS__);
	}

	public function signin()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
			$password = $_POST['password'];

			$user = new UserModel();
			$user->setUsuario($usuario);
			$user->setPassword($password);

			if ($user->login()) {
				$_SESSION['user'] = $usuario;
				$_SESSION['logout'] = false;
				header('Location: /gestion-clinica/pacientes'); //reemplazar "gestion-clinica" x una CONSTANTE
			} else {
				$_SESSION['logout'] = false;
				$_SESSION['login_error'] = true;
				$this->exec();
			}
		}
	}

	public function logout()
	{
		// if (isset($_SESSION['identity'])) {
		// 	unset($_SESSION['identity']);
		// }

		// if (isset($_SESSION['admin'])) {
		// 	unset($_SESSION['admin']);
		// }

		if (isset($_SESSION['user'])) {
			unset($_SESSION['user']);
		}
		session_destroy();
		$_SESSION['logout'] = true;
		header("Location:" . FOLDER_PATH);
	}
}
