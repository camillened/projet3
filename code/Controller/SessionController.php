<?php 
namespace App\Controller;

use App\Templating\View;
use Exception;

class SessionController
{
	private $login;
	private $password;

	// On démarre la session 
    public function __construct() { 
        session_start(); 
    } 
    //on se déconnecte
    public function logout() { 
	    session_unset(); 
	    session_destroy(); 
	} 

	//on assigne un attribut à la session
	public function setAttribut($login) {
		$_SESSION['login'] = $login; 
	}
	// vérifie l'existance d'une session (par rapport au login)
	public function existeAttribut($login) {
		return (isset($_SESSION['$login']) && $_SESSION['$login'] != "");
	}
	//renvoie la valeur de l'attribut de la session
	public function getAttribut($login){
		if ($this->existeAttribut($login)) {
			return $_SESSION['login']; 
		} else {
			throw new Exception("Attribut '$login' absent de la session");
		}
	}

}