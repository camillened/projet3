<?php
namespace App\Controller;

use App\Templating\View;

class LoginController 
{

  public function login() 
  {
    $view = new View("Log");
    $view->generer(array());
  }
}