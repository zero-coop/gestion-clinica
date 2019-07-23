<?php

defined('BASEPATH') or exit('No se permite acceso directo');

	class View
	{
		protected $plantilla;
		protected $nombre_controlador;
		protected $parametros;

		function __construct($nombre_controlador, $parametros = array())
		{
			$this->nombre_controlador = $nombre_controlador;
			$this->parametros = $parametros;
			$this->render();

		}

		protected function render()
		{
			if(class_exists($this->nombre_controlador))
			{
				$nombre_archivo = str_replace('Controller', '', $this->nombre_controlador);
				$this->plantilla = $this->getPlantilla($nombre_archivo);
				echo $this->plantilla;
			}else {
				throw new Exception("Error Clase {$this->nombre_controlador} no encontrada");			
			}
		}

		protected function getPlantilla($nombre_archivo)
		{
			$ruta_archivo = PATH_VIEWS . "$nombre_archivo/$nombre_archivo.php";
			if(is_file($ruta_archivo))
			{
				extract($this->parametros);
				ob_start();
				require ($ruta_archivo);
				$this->plantilla = ob_get_contents();
				ob_end_clean();
				return $this->plantilla;
			}else {
				throw new Exception("Error no existe {$ruta_archivo}");
			}
		}
	}
?>