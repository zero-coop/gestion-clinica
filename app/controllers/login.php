<?php
require_once PATH_MODELS . 'UsuarioModel.php';

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

	public function login()
	{
		if (isset($_POST)) {
			$usuario = new UsuarioModel();
			$usuario->setEmail($_POST['email']);
			$usuario->setPassword($_POST['password']);
			$identity = $usuario->login();

			if ($identity && is_object($identity)) {
				$_SESSION['identity'] = $identity;
				if ($identity->rol == 'admin') {
					$_SESSION['admin'] = true;
				}
				//echo "SESSION INICIADA <br>";
				//echo "Nombre: ". $_SESSION['identity']->nombre . "<br>";
				//echo "Apellido: ". $_SESSION['identity']->apellido . "<br>";
				//echo "Correo: ". $_SESSION['identity']->email . "<br>";
				//echo "ROL: ". $_SESSION['identity']->rol . "<br>";

				//header('Location:'. PATH_CONTROLLERS . 'home');

			} else {
				$_SESSION['error_login'] = 'Datos erroneos';
				$error_message = 'ERROR!';
				$this->exec();
			}
		} else {
			echo 'ERROR!';
		}
	}

	public function logout()
	{
		if (isset($_SESSION['identity'])) {
			unset($_SESSION['identity']);
		}

		if (isset($_SESSION['admin'])) {
			unset($_SESSION['admin']);
		}

		header("Location:" . base_url);
	}
}
