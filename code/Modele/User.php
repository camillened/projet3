<?php 
namespace App\Modele;

use Exception;

class User extends Modele
{
	private $login;
	private $password;

	public function verifUser($login, $password)
	{
		//on sale et hache le mot de passe proposé :	
		$passsalt = "kL18" . $password . '*12cbg';
		$passhash = sha1($passsalt);
		//on cherche dans la bdd
		$sql = 'SELECT login, password FROM users WHERE login=? AND password=?';
		$user = $this->executerRequete($sql, array($login, $passhash));
		//retourne le résultat
		return($user->rowCount() == 1);
	}

    //Renvoie un utilisateur existant dans la BD
    public function getUser($login, $password)
    {
    	//on sale et hache le mot de passe proposé :	
		$passsalt = "kL18" . $password . '*12cbg';
		$passhash = sha1($passsalt);
        
        $sql = "SELECT user_id, login, password FROM users WHERE login=? and password=?";
        $user = $this->executerRequete($sql, array($login, $passhash));
        if ($user->rowCount() == 1)
            return $user->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun utilisateur ne correspond aux identifiants fournis");
    }
}