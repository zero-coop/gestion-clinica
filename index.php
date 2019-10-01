<?php
define('BASEPATH', true);
session_start();

require 'system/config.php'; //define "constantes" para la conexion a la DB y una mejor navegacion por las carpetas
require 'system/core/autoload.php'; //hace la carga de las clases y archivos de la carpeta core

$router = new Router();

$controlador = $router->getController(); //obtiene solo con controlador desde la url
$metodo = $router->getMethod(); //obtiene solo el metodo desde la url
$parametro = $router->getParameter(); //obtiene solo el parametro desde la url

// Accedemos a la funcion "validateController" de la clase "CoreHelper" y le pasame por parametro el controlador para verificar que exista tal, de lo contrario el controlador sera "errorpage"
if (!CoreHelper::validateController($controlador)) {
    $controlador = 'errorpage';
}


require PATH_CONTROLLERS . "{$controlador}.php";

if (!CoreHelper::validateMethodController($controlador, $metodo)) {
    $metodo = 'exec'; //metodo "por default" si no existe metodo en la url
}

if ($controlador == 'login' && $metodo != 'logout') {
    if (isset($_SESSION['user'])) {
        require PATH_CONTROLLERS . "pacientes.php";
        $controlador = 'pacientes';
    }
} else {
    if (!isset($_SESSION['user'])) {
        die("ERROR");
    }
}


$footer = false;
if ($controlador != 'login' && $controlador != 'errorpage') {
    $footer = true;
    require_once PATH_VIEWS . 'layout/header.php';
    require_once PATH_VIEWS . 'layout/sidebar.php';
}

$controlador = new $controlador();

$controlador->$metodo($parametro);

if ($footer) {

    require_once PATH_VIEWS . 'layout/footer.php';
}
