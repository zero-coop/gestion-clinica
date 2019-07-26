<?php
    define('BASEPATH', true);
    
    require 'system/config.php';
    require 'system/core/autoload.php';

    $router = new Router();

    $controlador = $router->getController();
    $metodo = $router->getMethod();
    $parametro = $router->getParameter();

    if(!CoreHelper::validateController($controlador)){
        $controlador = 'errorpage';
    }
        
    require PATH_CONTROLLERS . "{$controlador}.php";

    if(!CoreHelper::validateMethodController($controlador, $metodo)){
        $metodo = 'exec'; //ejecuta el metodo exec de la clase correspondiente
    }

    //echo 'controlador: ' . $controlador . ',' . ' metodo: ' . $metodo. '</br>' ;
    //echo URI;

    //$hide = true;
    //if ($controlador != 'login'){
    //    $hide = false;
    //    require_once PATH_VIEWS . 'layout/header.php';
    //    require_once PATH_VIEWS . 'layout/sidebar.php';
   // }
    
    $controlador = new $controlador();
    //echo $metodo;
    $controlador->$metodo($parametro);

    //if (!$hide){
    //    require_once PATH_VIEWS . 'layout/footer.php';
    //}
    