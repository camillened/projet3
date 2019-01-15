<?php namespace App\Modele;

use \Michelf\markdown;

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
	public function saveNewBillet($title, $content) 
	{
  		$sql = 'INSERT INTO billets (billet_date, billet_title, billet_content) VALUES (?,?,?)';
  		$date = date("Y-m-d");//récupère la date
  		$this->executerRequete($sql, array($date, $title, $content));
	}

}