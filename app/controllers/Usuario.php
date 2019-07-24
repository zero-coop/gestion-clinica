<?php
require_once PATH_MODELS . 'UsuarioModel.php';

class Usuario
{

    public function index()
    {
        echo "Controlador Usuarios, Acción index";
    }

    public function registro()
    {
        require_once 'views/usuario/registro.php';
    }

    public function save()
    {
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            if ($nombre && $apellidos && $email && $password) {
                $usuario = new UsuarioModel();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);

                $save = $usuario->save();
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
        header("Location:" . base_url . 'usuario/registro');
    }

    public function login()
    {
        if (isset($_POST)) {
            // Identificar al usuario
            // Consulta a la base de datos
            $usuario = new UsuarioModel();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            $identity = $usuario->login();

            if ($identity && is_object($identity)) {
                $_SESSION['identity'] = $identity;

                if ($identity->rol == 'admin') {
                    $_SESSION['admin'] = true;
                }
            } else {
                $_SESSION['error_login'] = 'Identificación fallida !!';
            }
        }
        echo "SESSION INICIADA <br>";
        echo "Nombre: ". $_SESSION['identity']->nombre . "<br>";
        echo "Apellido: ". $_SESSION['identity']->apellido . "<br>";
        echo "Correo: ". $_SESSION['identity']->email . "<br>";
        echo "ROL: ". $_SESSION['identity']->rol . "<br>";
        
        
        //header("Location:" . FOLDER_PATH);
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
} // fin clase
