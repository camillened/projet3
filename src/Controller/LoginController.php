<?php namespace App\Controller;

use \Michelf\markdown;
use App\View;

class LoginController {

  public function login() 
  {
    $view = new View("Log");
    $view->generer(array());
  }
}