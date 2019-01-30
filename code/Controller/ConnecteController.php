<?php
namespace App\Controller;

use App\Modele\User;
use App\Templating\View;


class ConnecteController
{
    private $user;
    private $session;

    public function __construct()
    {
        $this->user = new User();
        $this->session = new SessionController();
    }

    public function connecter($login, $password)
    {
            if ($this->user->verifUser($login, $password)) {
                $user = $this->user->getUser($login, $password);
                $this->getSession()->setAttribut("user_id",
                        $user['user_id']);
                $this->getSession()->setAttribut("login",
                        $user['login']);
                //faire redirection vers admin ???
                $view = new AdminController();
                $view->admin();
            } else {
                $view = new LoginController();
                $view->login();/// + rajouter message d'erreur : login ou mot de passe incorrect
            }
    }
    
    public function deconnecter()
    {
        // Suppression des variables de session et de la session
        $_SESSION = array();
        session_destroy();
        $view = new HomeController();
        $view->home();
    }

    public function getSession()
    {
        return $this->session;
    }
}