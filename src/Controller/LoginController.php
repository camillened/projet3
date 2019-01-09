<?php namespace App\Controller;

require ("vendor/autoload.php");

use \Michelf\markdown;
use App\View;
use App\Modele;

class LoginController {

  public function login() 
  {
    $view = new View("Log");
    $view->generer(array());
  }
}