<?php namespace App\Modele;

use \Michelf\markdown;


class User extends Modele
{

	public function verifUser($pseudo, $password){
		//on sale et hache le mot de passe proposé :	
		$passsalt = "kL18" . $password . '*12cbg';
		$passhash = sha1($passsalt);
		//on cherche dans la bdd
		$sql = 'SELECT pseudo, password FROM users WHERE pseudo=:pseudo AND password=:passhash';
		$sql = $this->executerRequete($sql);
		//retourne le résultat
		$req = $sql->fetchAll();
		if(count($))==0){ //si on a rien : faux

			return false;
		} else { // sinon : vrai
			return true;
		}
	}
}