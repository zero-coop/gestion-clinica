<?php
    defined('BASEPATH') or exit('No se permite acceso directo');
    
    class Router
    {
        public $uri;
        public $controller;
        public $method;
        public $Parameter;

        public function __construct(){
            $this->setUri();
            $this->setController();
            $this->setMethod();
            $this->setParameter();
        }

        public function setUri(){
            $this->uri = explode('/', URI);
        }
        public function setController(){
            $this->controller = $this->uri[2] === '' ? 'home' : $this->uri[2];
        }
        public function setMethod(){
            $this->method = !empty($this->uri[3]) ? $this->uri[3] : 'exec';
        }
        public function setParameter(){
            if(REQUEST_METHOD === 'POST')
              $this->parameter = $_POST;
            else if (REQUEST_METHOD === 'GET')
              $this->parameter = !empty($this->uri[4]) ? $this->uri[4] : '';
        }

        public function getUri(){
            return $this->uri;
        }
        public function getController(){
            return $this->controller;
        }
        public function getMethod(){
            return $this->method;
        }
        public function getParameter(){
            return $this->parameter;
        }    
    }
?>