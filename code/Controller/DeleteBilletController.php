<?php namespace App\Controller;

use \Michelf\markdown;
use App\Modele\Billet;
use App\Templating\View;


class DeleteBilletController 
{
	private $billet;


  public function __construct() 
  {
    $this->billet = new Billet();
  }

  public function delBillet($billet_id)
  {
    // supprime le billet
    $this->billet->deleteBillet($billet_id);
    // actualiser la page admin à jour
    $billets = $this->billet->getBillets();
    $view = new View("Admin");
    $view->generer(array('billets' => $billets));
  }
}