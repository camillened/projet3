<?php

require_once ('Controller/ModeleAutoloader.php');
ModeleAutoloader::register();

class Billet extends Modele
{

	public function getBillets()//renvoie la liste des billets
	{
		$sql= 'SELECT billet_id, billet_date, billet_title, billet_content FROM billets ORDER BY billet_id DESC';
		$billets = $this->executerRequete($sql);
		return $billets;
	}
	public function getBillet($billet_id)//renvoie un billet
	{
		$sql = 'SELECT billet_id, billet_date, billet_title, billet_content FROM billets WHERE billet_id=?';
		$billet = $this->executerRequete($sql, array($billet_id));
		if ($billet->rowCount() == 1)
			return $billet->fetch(); //accès à la première ligne de résultat
		else
			throw new Exception ("Aucun billet ne correspond à l'identifiant '$billet_id'");

	}

}