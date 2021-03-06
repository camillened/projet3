<?php
namespace App\Controller;

use App\Modele\Billet;
use App\Modele\Comment;
use App\Modele\User;
use App\Templating\View;

class AdminController 
{
    private $billet;
    private $comment;

    public function __construct() 
    {
        $this->billet = new Billet();
        $this->comment = new Comment();
    }

    public function admin() 
    {
            $billets = $this->billet->getBillets();
            $comments = $this->comment->modComment();
            $view = new View("Admin");
            $view->generer(array('billets' => $billets, 'comments' => $comments));
        }
}