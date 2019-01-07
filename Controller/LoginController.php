<?php

require_once ('Controller/ModeleAutoloader.php');
ModeleAutoloader::register();
require_once ('View/View.php');

class LoginController {

  public function login() 
  {
    $view = new View("Log");
    $view->generer(array());
  }
}