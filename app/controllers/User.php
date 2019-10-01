<?php
require_once PATH_MODELS . 'UserModel.php';

class User extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    public function exec()
	{
		$this->view->render(__CLASS__);
    }
    
    public function registro()
    {
        require_once 'views/user/registro.php';
    }

    public function newUser()
    {
        if (isset($_POST)) {
            //var_dump ($_POST);
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $email2 = isset($_POST['email2']) ? $_POST['email2'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;
            $password2 = isset($_POST['password2']) ? $_POST['password2'] : false;
            
            if ($nombre && $apellido && $email && $password) {
                $usuario = new UserModel();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellido);
                $usuario->setEmail($email);
                $usuario->setPassword($password);
                //echo $usuario->userExist($email);
                if ($usuario->userExist($email)->num_rows){
                    echo 'usuario existente puto!';
                }
                //$save = $usuario->save();
                echo 'se grabo jeje';
                if ($save) {
                    $_SESSION['register'] = "complete";
                } else {
                    $_SESSION['register'] = "failed";
                }
            } else {
                $_SESSION['register'] = "failed";
            }
        } else {
            $_SESSION['register'] = "failed";
        }
        
    } 
    

} // fin clase
