<?php

//Define constantes para la DB
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DB', 'clinica');

//Define constaste para la URI
define('URI', $_SERVER['REQUEST_URI']);

define('REQUEST_METHOD', $_SERVER['REQUEST_METHOD']);

//Define constante de carpeta CORE
define('CORE', 'system/core/');

//Define ruta de controladores
define('PATH_CONTROLLERS', 'app/controllers/');

//Define ruta de vistas
define('PATH_VIEWS', 'app/views/');

//Prueba carpeta Static
define('STATICSS', 'static/css/');

//Define ruta de modelos
define('PATH_MODELS', 'app/models/');

//Define ruta de Helpers
define('HELPER_PATH', 'system/helpers/');

//Define ruta de Librerias
define('PATH_LIBS', 'system/libs/');

//Define ruta Root
define('FOLDER_PATH', '/gestion-clinica/');

define('ROOT', $_SERVER['DOCUMENT_ROOT']);


