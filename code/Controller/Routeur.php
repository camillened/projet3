<?php
namespace App\Controller;

use Exception;
use App\Templating\View;

class Routeur {

  private $ctrlHome;
  private $ctrlBillet;
  private $ctrlLogin;
  private $ctrlAdmin;
  private $ctrlAdminBillet;
  private $ctrlAdminComment;

  public function __construct() 
  {
    $this->ctrlHome = new HomeController();
    $this->ctrlBillet = new BilletController();
    $this->ctrlLogin = new LoginController();
    $this->ctrlAdmin = new AdminController();
    $this->ctrlAdminBillet = new AdminBilletController();
    $this->ctrlAdminComment = new AdminCommentController();
  }

  // Traite une requête entrante
  public function routerRequete() 
  {
    try {

      if (!isset($_GET['action'])){
        $this->ctrlHome->home();
      
      } else {

      switch ($_GET['action']) {//a régler le soucis de la page d'accueil

        //affiche un billet
        case "billet": 
          if (isset($_GET['id'])) {
            $billet_id = intval($_GET['id']);
            if ($billet_id != 0) {
              $this->ctrlBillet->billet($billet_id);
            } else
              throw new Exception("Identifiant de billet non valide");
          } else
            throw new Exception("Identifiant de billet non défini");
        break;

        //ajoute un commentaire
        case "comment":
          $author = $this->getParametre($_POST, 'author');
          $content = $this->getParametre($_POST, 'content');
          $billet_id = $this->getParametre($_POST, 'id');
          $this->ctrlBillet->commenter($author, $content, $billet_id);
        break;
        //signale un commentaire
        case "report":
          $comment_priority = $this->getParametre($_POST, 'comment_priority');
          $comment_id = $this->getParametre($_POST, 'comment_id');
          $billet_id = $this->getParametre($_POST, 'billet_id');
          $this->ctrlBillet->saveReport($comment_id, $comment_priority, $billet_id);
          break;



        //back  

        //affiche la page de connexion
        case "login":
          $this->ctrlLogin->login();
        break;
        //affiche la page administrateur
        case "admin":
          $this->ctrlAdmin->admin();
        break;

        //affiche la création d'un billet
        case "addbillet":
          $this->ctrlAdminBillet->addBillet();
        break;
        //enregistre le nouveau billet (à créer)
        case "savenewbillet":
          $title = $this->getParametre($_POST, 'title');
          $content = $this->getParametre($_POST, 'content');
          $this->ctrlAdminBillet->saveNew($title, $content);
        break;

        //supprime un billet
        case "deletebillet":
          if (isset($_GET['id'])) {
              $billet_id = intval($_GET['id']);
            if ($billet_id != 0) {
              $this->ctrlAdminBillet->delBillet($billet_id);
            } else
              throw new Exception("Identifiant de billet non valide");
          } else
            throw new Exception("Identifiant de billet non défini");
        break;

        //supprime un commentaire
        case "deletecomment":
          if (isset($_GET['id'])) {
              $comment_id = intval($_GET['id']);
            if ($comment_id != 0) {
              $this->ctrlAdminComment->delComment($comment_id);
            } else
              throw new Exception("Identifiant de commentaire non valide");
          } else
            throw new Exception("Identifiant de commentaire non défini");
        break;



        //valide un commentaire
        case "validcomment":


        break;


        //modif d'un billet existant
        case "updatebillet":
            if (isset($_GET['id'])) {
              $billet_id = intval($_GET['id']);
            if ($billet_id != 0) {
              $this->ctrlAdminBillet->updateBillet($billet_id);
            } else
              throw new Exception("Identifiant de billet non valide");
          } else
            throw new Exception("Identifiant de billet non défini");
        break;
        //enregistre la modification 
        case "saveupdatebillet":
          if (isset($_GET['id'])) {
            $billet_id = intval($_GET['id']);
            if ($billet_id != 0) {
              $title = $this->getParametre($_POST, 'title');
              $content = $this->getParametre($_POST, 'content');
              $billet_id = $this->getParametre($_POST, 'id');
              $this->ctrlAdminBillet->saveUpdate($title, $content, $billet_id);
            } else
              throw new Exception("Identifiant de billet non valide");
          } else
            throw new Exception("Identifiant de billet non défini");
        break;

        default:
            throw new Exception("Action non définie");
        break;
      } }
    }

    catch (Exception $e)  {
      $this->erreur($e->getMessage());
    }
  }

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
