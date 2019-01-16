<?php namespace App\Controller;

use \Michelf\markdown;
use App\Templating\View;

class LoginController {

//affiche le formulaire de connexion
  public function login() 
  {
    $view = new View("Log");
    $view->generer(array());
  }
}