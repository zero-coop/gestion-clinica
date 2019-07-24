<?php
/**
* 
*/
class ErrorPage extends Controller
{
  
  public function __construct()
  {
    parent::__construct();
    //echo __CLASS__;
  }

  function exec(){
    $this->view->render(__CLASS__);
  }
} 