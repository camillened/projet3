<?php
namespace App\Controller;

use App\Modele\Billet;
use App\Templating\View;

class HomeController
{
    private $billet;

    public function __construct() 
    {
        $this->billet = new Billet();
    }

// Affiche la liste de tous les billets du blog
    public function home() 
    {
        $billets = $this->billet->getBillets();
        $view = new View("Home");
        $view->generer(array('billets' => $billets));
    }
}