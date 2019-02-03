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
  private $ctrlConnecte;

  public function __construct() 
  {
    $this->ctrlHome = new HomeController();
    $this->ctrlBillet = new BilletController();
    $this->ctrlLogin = new LoginController();
    $this->ctrlAdmin = new AdminController();
    $this->ctrlAdminBillet = new AdminBilletController();
    $this->ctrlAdminComment = new AdminCommentController();
    $this->ctrlConnecte = new ConnecteController();
  }

  // Traite une requête entrante
  public function routerRequete() 
  {
    try {

      if (!isset($_GET['action'])){
        $this->ctrlHome->home();
      
      } else {

      switch ($_GET['action']) {

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

        //affiche la page de connexion ou la page admin si connecté
        case "admin":
          if(isset($_SESSION['login']) && $_SESSION['login'] != "") {
          $this->ctrlAdmin->admin();
          } else {
          $this->ctrlLogin->login();
          }
        break;

        case "connecte":
          if (isset($_POST['login']) && isset($_POST['password'])) {
              $login = $this->getParametre($_POST, 'login');
              $password = $this->getParametre($_POST, 'password');
              $this->ctrlConnecte->connecter($login, $password);
          } else
              throw new Exception("Action impossible : login ou mot de passe non défini");

        break;

        //affiche la création d'un billet
        case "addbillet":
          if(isset($_SESSION['login']) && $_SESSION['login'] != "") {
            $this->ctrlAdminBillet->addBillet();
          } else
            throw new Exception ('Action impossible : vous devez être connecté pour effectuer cette action');
        break;
        //enregistre le nouveau billet (à créer)
        case "savenewbillet":
          if(isset($_SESSION['login']) && $_SESSION['login'] != "") {
            $title = $this->getParametre($_POST, 'title');
            $content = $this->getParametre($_POST, 'content');
            $this->ctrlAdminBillet->saveNew($title, $content);
          } else
            throw new Exception ('Action impossible : vous devez être connecté pour effectuer cette action');
        break;

        //supprime un billet
        case "deletebillet":
          if(isset($_SESSION['login']) && $_SESSION['login'] != "") {
          if (isset($_GET['id'])) {
              $billet_id = intval($_GET['id']);
            if ($billet_id != 0) {
              $this->ctrlAdminBillet->delBillet($billet_id);
            } else
              throw new Exception("Identifiant de billet non valide");
          } else
            throw new Exception("Identifiant de billet non défini");
          } else
            throw new Exception ('Action impossible : vous devez être connecté pour effectuer cette action');
        break;

        //supprime un commentaire
        case "deletecomment":
          if(isset($_SESSION['login']) && $_SESSION['login'] != "") {
          if (isset($_GET['id'])) {
              $comment_id = intval($_GET['id']);
            if ($comment_id != 0) {
              $this->ctrlAdminComment->delComment($comment_id);
            } else
              throw new Exception("Identifiant de commentaire non valide");
          } else
            throw new Exception("Identifiant de commentaire non défini");
          } else
            throw new Exception ('Action impossible : vous devez être connecté pour effectuer cette action');
        break;

        //valide un commentaire
        case "validcomment":
          if(isset($_SESSION['login']) && $_SESSION['login'] != "") {
          if (isset($_GET['id'])) {
              $comment_id = intval($_GET['id']);
            if ($comment_id != 0) {
              $this->ctrlAdminComment->valComment($comment_id);
            } else
              throw new Exception("Identifiant de commentaire non valide");
          } else
            throw new Exception("Identifiant de commentaire non défini");
          } else
            throw new Exception ('Action impossible : vous devez être connecté pour effectuer cette action');
        break;

        //modif d'un billet existant
        case "updatebillet":
          if(isset($_SESSION['login']) && $_SESSION['login'] != "") {
          if (isset($_GET['id'])) {
              $billet_id = intval($_GET['id']);
            if ($billet_id != 0) {
              $this->ctrlAdminBillet->updateBillet($billet_id);
            } else
              throw new Exception("Identifiant de billet non valide");
          } else
            throw new Exception("Identifiant de billet non défini");
          } else 
            throw new Exception ('Action impossible : vous devez être connecté pour effectuer cette action');
        break;
        //enregistre la modification 
        case "saveupdatebillet":
          if(isset($_SESSION['login']) && $_SESSION['login'] != "") {
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
          } else
            throw new Exception ('Action impossible : vous devez être connecté pour effectuer cette action');
        break;

        case "deconnexion":
          $this->ctrlConnecte->deconnecter();
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
