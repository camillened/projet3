<?php namespace App\Controller;

use \Michelf\markdown;
use App\Modele\Billet;
use App\Templating\View;


class AddBilletController 
{
	private $billet;


  public function __construct() 
  {
    $this->billet = new Billet();
  }

  public function addBillet() 
  {
    $view = new View("AddBillet");
    $view->generer(array());
  }

  public function saveNew($title, $content)
  {
    // Sauvegarde le billet
    $this->billet->saveNewBillet($title, $content);
    // actualiser la page admin avec le nouveau billet dans la liste
    $billets = $this->billet->getBillets();
    $view = new View("Admin");
    $view->generer(array('billets' => $billets));
  }
}