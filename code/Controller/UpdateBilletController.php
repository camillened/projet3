<?php namespace App\Controller;

use \Michelf\markdown;
use App\Modele\Billet;
use App\Templating\View;


class UpdateBilletController 
{
	private $billet;


  public function __construct() 
  {
    $this->billet = new Billet();
  }

  //charge la page d'édition avec le billet séléctionné
  public function updateBillet($billet_id) 
  {
    $billet = $this->billet->getBillet($billet_id);
    $view = new View("UpdateBillet");
    $view->generer(array('billet' => $billet));
  }

  public function saveUpdate($title, $content, $billet_id)
  {
    // Sauvegarde le billet
    $this->billet->saveUpdateBillet($title, $content, $billet_id);
    // actualiser la page admin avec le nouveau billet dans la liste
    $billets = $this->billet->getBillets();
    $view = new View("Admin");
    $view->generer(array('billets' => $billets));
  }
}