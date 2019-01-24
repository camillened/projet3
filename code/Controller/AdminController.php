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
    private $user;

    public function __construct() 
    {
        $this->billet = new Billet();
        $this->comment = new Comment();
        $this->user = new User();
    }

// Affiche la liste de tous les billets du blog
    public function admin() 
    {
        //if($this->user->verifUser($login, $password) === true){
            $billets = $this->billet->getBillets();
            $comments = $this->comment->modComment();
            $_SESSION['Auth'] = true;
            $view = new View("Admin");
            $view->generer(array('billets' => $billets, 'comments' => $comments));
        }
        /*else {// si pas d'user : vue login
            $view = new View("Log");
            $view->generer(array());
        }
    }

    public function deconnecte(){
            $_SESSION['Auth'] = false;
            $vue = new View ("LogOut");
            $vue->generer(array());
    }*/
  
}