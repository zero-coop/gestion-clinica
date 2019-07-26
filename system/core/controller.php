<?php  

	//defined('BASEPATH') or exit('No se permite acceso directo');

	abstract class Controller {
		
		public $view;

		public function __construct()
		{
			$this->view = new View();
		}

		public function loadModel(){
			
		}
		
		abstract public function exec();
	}
?>