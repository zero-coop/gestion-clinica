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
	
	public static function isIdentity(){
		if(!isset($_SESSION['identity'])){
			header("Location:".base_url);
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

	public static function showProvincias(){
		require_once 'models/provincias.php';
		$prov = new Provincias();
		$provincias = $prov->getAll();
		return $provincias;
	}
	
	public static function statsCarrito(){
		$stats = array(
			'count' => 0,
			'total' => 0
		);
		
		if(isset($_SESSION['carrito'])){
			$stats['count'] = count($_SESSION['carrito']);
			
			foreach($_SESSION['carrito'] as $paciente){
				$stats['total'] += $paciente['precio']*$paciente['unidades'];
			}
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
