<?php namespace App\Controller;

use \Michelf\markdown;
use App\Modele\billet;
use App\View;

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