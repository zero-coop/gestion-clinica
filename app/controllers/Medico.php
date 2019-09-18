<?php
require_once PATH_MODELS . 'MedicoModel.php';

class Medico extends Controller {

    public function __construct()
        {
            parent::__construct();
    }

    public function agregarMedico(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$data = [
			'nombre' => trim($_POST['nombre']),
			'apellidos' => trim($_POST['apellidos']),
            'telefono' => trim($_POST['telefono']),
            'direccion' => trim($_POST['direccion']),
            'especialidad' => trim($_POST['especialidad'])
			];

			if($this->MedicoModel->agregarMedico($data)){
				redirection(''); //Analizar a donde debe ir
			}else{
				die('Algo salio mal');
			    }
		}else{
			$data = [
				'nombre' => '',
				'apellido' => '',
                'telefono' => '',
                'direccion' => '',
                'especialidad' => '',
			];

			$this->views('pages/Medico', $data);
		}
		
		
    }
    
    public function editarMedico($id){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$data = [
            'id' => $id,
			'nombre' => trim($_POST['nombre']),
			'apellidos' => trim($_POST['apellidos']),
            'telefono' => trim($_POST['telefono']),
            'direccion' => trim($_POST['direccion']),
            'especialidad' => trim($_POST['especialidad'])
            ];

            if($this->MedicoModel->editarMedico($data)){
				redirection(''); //redirigir a la vista general o vista de ese ID
			}else{
				die('Algo salio mal');	
			     }
		}else{

			//Obtener info de medico desde el modelo
			$user = $this->MedicoModel->getId($id);
	
			$data = [
			    'id' => $user->id,
			    'nombre' => $user->nombre,
			    'apellidos' => $user->apellidos,
                'telefono' => $user->telefono,
                'direccion' => $user->direccion,
                'especialidad' => $user->especialidad
				];

			$this->views('pages/editarMedico', $data);
		}
	}




}