<?php namespace App\Controller;

use \Michelf\markdown;
use App\Modele\Billet;
use App\Templating\View;

class AdminController 
{

  private $billet;

  public function __construct() 
  {
    $this->billet = new Billet();
  }

  // Affiche la liste de tous les billets du blog
  public function admin() 
  {
    $billets = $this->billet->getBillets();
    $view = new View("Admin");
    $view->generer(array('billets' => $billets));
  }
}