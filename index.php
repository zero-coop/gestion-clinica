<?php
    define('BASEPATH', true);
    
    require 'system/config.php';
    require 'system/core/autoload.php';

    $router = new Router();

    $controlador = $router->getController();
    $metodo = $router->getMethod();
    $parametro = $router->getParam();

    if(!CoreHelper::validateController($controlador))
        $controlador = 'ErrorPage';

    require PATH_CONTROLLERS . "{$controlador}.php";

    $controlador.='Controller';

    if(!CoreHelper::validateMethodController($controlador, $metodo))
        $metodo = 'exec'; //ejecuta el metodo exec de la clase correspondiente

    $controller = new $controlador();

    $controller->$metodo($parametro);
?>