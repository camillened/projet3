<?php
namespace App\Controller;

use App\Modele\Billet;
use App\Modele\Comment;
use App\Templating\View;

class AdminBilletController 
{
    private $billet;
    private $comment;

    public function __construct() 
    {
        $this->billet = new Billet();
        $this->comment = new Comment();
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
        $comments = $this->comment->modComment();
        $view = new View("Admin");
        $view->generer(array('billets' => $billets, 'comments' => $comments));//ou redirection (header?)?
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