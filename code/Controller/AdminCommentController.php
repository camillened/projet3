<?php
namespace App\Controller;

use App\Modele\Billet;
use App\Modele\Comment;
use App\Templating\View;

class AdminCommentController 
{
    private $billet;
    private $comment;

    public function __construct() 
    {
        $this->billet = new Billet();
        $this->comment = new Comment();
    }


    public function delComment($comment_id)
    {
// supprime le commentaire
        $this->comment->deleteComment($comment_id);
// actualiser la page admin à jour
        $billets = $this->billet->getBillets();
        $comments = $this->comment->modComment();

        $view = new View("Admin");
        $view->generer(array('billets' => $billets, 'comments' => $comments));
    }
   }