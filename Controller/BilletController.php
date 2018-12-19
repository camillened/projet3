<?php

require_once ('Modele/Billet.php');
require_once ('Modele/Comment.php');
require_once ('View/View.php');

class BilletController {

  private $billet;
  private $comment;

  public function __construct() 
  {
    $this->billet = new Billet();
    $this->comment = new Comment();
  }

  // Affiche les détails sur un billet
  public function billet($billet_id) 
  {
    $billet = $this->billet->getBillet($billet_id);
    $comments = $this->comment->getComments($billet_id);
    $view = new View("Billet");
    $view->generer(array('billet' => $billet, 'comments' => $comments));
  }
}