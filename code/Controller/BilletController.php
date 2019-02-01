<?php
namespace App\Controller;

use App\Modele\Billet;
use App\Modele\Comment;
use App\Templating\View;

class BilletController 
{
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

//ajoute un commentaire à un billet
    public function commenter($author, $content, $billet_id)
    {
// Sauvegarde le commentaire
        $this->comment->addComment($author, $content, $billet_id);
// actualiser l'affichage du billet avec le nouveau commentaire
        $this->billet($billet_id);
    }

    //signale un commentaire
    public function saveReport($comment_id, $comment_priority, $billet_id)
    {
        $this->comment->reportComment($comment_priority, $comment_id);
        $this->billet($billet_id);
    }
}