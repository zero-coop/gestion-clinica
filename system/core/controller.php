<?php  

	defined('BASEPATH') or exit('No se permite acceso directo');

	abstract class Controller{
		
		private $vista;

		public function __construct()
		{
			//echo __CLASS__ .' instanciada';
		}

		protected function render($nombre_controlador = '', $parametros = array())
		{
			$this->vista = new View($nombre_controlador, $parametros);
		}

		abstract public function exec();
	}
?>