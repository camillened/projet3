<?php namespace App\Controller;

use \Michelf\markdown;
use App\Templating\View;

class Session
{
	$_SESSION['pseudo'] = $pseudo;
	$_SESSION['password'] = $password;

// On démarre la session 
    private function __construct() { 
        session_start(); 
    } 

    public function logout() { 
	    session_unset(); 
	    session_destroy(); 
	} 
}

?>