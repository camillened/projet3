<?php

require_once 'Controller/HomeController.php';
require_once 'Controller/BilletController.php';
require_once 'View/View.php';

class Routeur {

  private $ctrlHome;
  private $ctrlBillet;

  public function __construct() 
  {
    $this->ctrlHome = new HomeController();
    $this->ctrlBillet = new BilletController();
  }

  // Traite une requête entrante
  public function routerRequete() 
  {
    try 
    {
      if (isset($_GET['action'])) 
      {
        if ($_GET['action'] == 'billet') 
        {
          if (isset($_GET['id'])) 
          {
            $idBillet = intval($_GET['id']);
            if ($billet_id != 0) 
            {
              $this->ctrlBillet->billet($billet_id);
            }
            else
              throw new Exception("Identifiant de billet non valide");
          }
          else
            throw new Exception("Identifiant de billet non défini");
        }
        else
          throw new Exception("Action non valide");
      }
      else 
      {  // aucune action définie : affichage de l'accueil
        $this->ctrlHome->home();
      }
    }
    catch (Exception $e) 
    {
      $this->erreur($e->getMessage());
    }
  }

  // Affiche une erreur
  private function erreur($msgErreur) {
    $view = new View("Erreur");
    $view->generer(array('msgErreur' => $msgErreur));
  }
}