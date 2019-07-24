<?php 

	class Login extends Controller
	{
		private $model;
		private $session;

		public function __construct()
		{
			parent::__construct();
			//$this->model = new LoginModel("usuarios");
			//$this->session = new Session();
		}

		public function signin($request_params)
		{
			$result = $this->model->sigIn($request_params['nUser']);

			if(!$result->num_rows)
			{
				$this->renderErrorMessage('Datos incorrectos');
			}else{
			
				$client = $result->fetch_object();
				if($request_params['nPassword'] != $client->contrasenia) //tratar de usar password_verity con contreseña encriptada
				{
					$this->renderErrorMessage('Datos incorrectos');
				}else{

					$this->session->init();
					$this->session->add('usuario', $client->usuario);
					header('location: /Drugstore_mvc/main');
				}
			}	
		}

		public function renderErrorMessage($message)
		{
			$parametros = array('error_message' => $message);
			$this->render(__CLASS__, $parametros);
		}
		
		function exec(){
			$this->view->render(__CLASS__);
		}
	}
?>