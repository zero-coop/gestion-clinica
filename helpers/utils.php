<?php

class Utils{
	
	public static function deleteSession($name){
		if(isset($_SESSION[$name])){
			$_SESSION[$name] = null;
			unset($_SESSION[$name]);
		}
		
		return $name;
	}
	
	public static function isAdmin(){
		if(!isset($_SESSION['admin'])){
			header("Location:".base_url);
		}else{
			return true;
		}
	}

	public static function showAdmin(){
		if(!isset($_SESSION['admin'])){
			return false;
		}else{
			return true;
		}
	}
	
	public static function isIdentity(){
		if(!isset($_SESSION['identity'])){
//			header("Location:".base_url);
		}else{
			return true;
		}
	}
	
	public static function showDoctores(){
		require_once 'models/doctor.php';
		$doctor = new Doctor();
		$doctores = $doctor->getAll();
		return $doctores;
	}

	public static function showObras(){
		require_once 'models/obrasociales.php';
		$obra = new ObraSocial();
		$obras = $obra->getAll();
		return $obras;
	}

	public static function getObra($id_paciente){
		require_once 'models/obrasociales.php';
		$obrasocial = new ObraSocial();
		$obra = $obrasocial->getObraSocial($id_paciente);
		return $obra;
	}

	public static function showProvincias(){
		require_once 'models/provincias.php';
		$prov = new Provincias();
		$provincias = $prov->getAll();
		return $provincias;
	}

	public static function showMetodosPagos(){
		require_once 'models/metodospagos.php';
		$metodos = new MetodosPagos();
		$metodospagos = $metodos->getAll();
		return $metodospagos;
	}

	public static function showGrupos(){
		require_once 'models/gruposanguineo.php';
		$grupo = new GrupoSanguineo();
		$grupos = $grupo->getAll();
		return $grupos;
	}
	
	public static function statsCarrito(){
		$stats = array(
			'count' => 0,
			'total' => 0
		);
		
		if(isset($_SESSION['carrito'])){
			$stats['count'] = count($_SESSION['carrito']);
			
		}
		
		return $stats;
	}
	
	public static function showStatus($status){
		$value = 'Pendiente';
		
		if($status == 'confirm'){
			$value = 'Pendiente';
		}elseif($status == 'preparation'){
			$value = 'Atendiendo';
		}elseif($status == 'ready'){
			$value = 'Terminado';
		};
		
		return $value;
	}
	
}
