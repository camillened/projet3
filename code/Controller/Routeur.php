<?php namespace App\Controller;

use \Michelf\markdown;
use Exception;
use App\Templating\View;

class Routeur {

  private $ctrlHome;
  private $ctrlBillet;
  private $ctrlLogin;
  private $ctrlAdmin;
  private $ctrlAddBillet;
  private $ctrlDeleteBillet;
  private $ctrlUpdateBillet;

  public function __construct() 
  {
    $this->ctrlHome = new HomeController();
    $this->ctrlBillet = new BilletController();
    $this->ctrlLogin = new LoginController();
    $this->ctrlAdmin = new AdminController();
    $this->ctrlAddBillet = new AddBilletController();
    $this->ctrlDeleteBillet = new DeleteBilletController();
    $this->ctrlUpdateBillet = new UpdateBilletController();
  }

  // Traite une requête entrante
  public function routerRequete() 
  {
    try {
      if (isset($_GET['action'])) {
        //affiche un billet
        if ($_GET['action'] == 'billet') {
          if (isset($_GET['id'])) {
            $billet_id = intval($_GET['id']);
            if ($billet_id != 0) {
              $this->ctrlBillet->billet($billet_id);
            } else
              throw new Exception("Identifiant de billet non valide");
          } else
            throw new Exception("Identifiant de billet non défini");
        //ajoute un commentaire
        } else if ($_GET['action'] == 'comment') {
          $author = $this->getParametre($_POST, 'author');
          $content = $this->getParametre($_POST, 'content');
          $billet_id = $this->getParametre($_POST, 'id');
          $this->ctrlBillet->commenter($author, $content, $billet_id);
        //affiche la page de connexion
        } else if ($_GET['action'] == 'login') {
          $this->ctrlLogin->login();
        //affiche la page administrateur
        } else if ($_GET['action'] == 'admin') {
          $this->ctrlAdmin->admin();

        //affiche la création d'un billet
        } elseif ($_GET['action'] == 'addbillet') {
          $this->ctrlAddBillet->addBillet();
        //enregistre le nouveau billet (à créer)
        }elseif ($_GET['action'] == 'savenewbillet') {
          $title = $this->getParametre($_POST, 'title');
          $content = $this->getParametre($_POST, 'content');
          $this->ctrlAddBillet->saveNew($title, $content);

        //supprime un billet
        } elseif ($_GET['action'] == 'deletebillet') {
          if (isset($_GET['id'])) {
              $billet_id = intval($_GET['id']);
            if ($billet_id != 0) {
              $this->ctrlDeleteBillet->delBillet($billet_id);
            } else
              throw new Exception("Identifiant de billet non valide");
          } else
            throw new Exception("Identifiant de billet non défini");

        //modif d'un billet existant
        } elseif ($_GET['action'] == 'updatebillet') {
            if (isset($_GET['id'])) {
              $billet_id = intval($_GET['id']);
            if ($billet_id != 0) {
              $this->ctrlUpdateBillet->updateBillet($billet_id);
            } else
              throw new Exception("Identifiant de billet non valide");
          } else
            throw new Exception("Identifiant de billet non défini");
        //enregistre la modification 
        } elseif ($_GET['action'] == 'saveupdatebillet') {
          if (isset($_GET['id'])) {
            $billet_id = intval($_GET['id']);
            if ($billet_id != 0) {
              $title = $this->getParametre($_POST, 'title');
              $content = $this->getParametre($_POST, 'content');
              $billet_id = $this->getParametre($_POST, 'id');
              $this->ctrlUpdateBillet->saveUpdate($title, $content, $billet_id);
            } else
              throw new Exception("Identifiant de billet non valide");
          } else
            throw new Exception("Identifiant de billet non défini");

        } else
          throw new Exception("Action non valide");

      } else {  // aucune action définie : affichage de l'accueil
        $this->ctrlHome->home();
      }
    }

    catch (Exception $e)  {
      $this->erreur($e->getMessage());}}

  // Affiche une erreur
  private function erreur($msgErreur) {
    $view = new View("Erreur");
    $view->generer(array('msgErreur' => $msgErreur));
  }

    // Recherche un paramètre dans un tableau
  private function getParametre($tableau, $nom) 
  {
    if (isset($tableau[$nom])) {
      return $tableau[$nom];}
    else
      throw new Exception("Paramètre '$nom' absent");
  }

}
