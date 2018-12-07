<?php

require('modele.php');

class BilletsManager
{
	private $_db; // instance de PDO

	public function __construct($db)
	{
		$this->setDb($db);
	}

	public function add(Billet $billet)
	{
		//requête d'insersion
		$q = $this->_bd->prepare('
			INSERT INTO billets(/*billet_date, */billet_title, billet_content) 
			VALUES(/*:billet_date, */:billet_title, :billet_content)');
		//asignation des valeurs
		//$q->bindvalue('billet_:date', $billet->billet_date());//ici rajouter PDO::PARAMETRE DATE??
		$q->bindvalue('billet_title', $billet->billet_title(), PDO::PARAM_STRING);// paramètre ok?
		$q->bindvalue('billet_content', $billet->billet_content(), PDO::PARAM_StrING); // parametre ok?
		//execution requête
		$q->execute();
	}

	public function count()
	{
		return $this->_db->query('SELECT COUNT(*) FROM billets')->fetchColumn();
	}

	public function delete(Billet $billet)
	{
		$this->_db->exec('
			DELETE FROM billets 
			WHERE billet_id = '.$billet->billet_id());
	}

	public function exists ($info)
	{
		if (is_int($info)) // si info est un entier
		{
			return (bool) $this->_db->query('SELECT COUNT(*) FROM billets WHERE id = '.$info)->fetchColumn(); //alors on regarde s'il existe en Id
		} //sinon ? voir tp mini jeu combat, mettre 
	}

	public function get($billet_id)//ou $info ? voir diff avec tp mini jeu combat
	{
		$billet_id = (int) $billet_id;
		$q = $this->_db->query('
			SELECT billet_id, billet_date, billet_title, billet_content 
			FROM billet_billets 
			WHERE billet_id = '.$billet_id);
		$data = $q->fetch(PDO::FETCH_ASSOC);
		return new Billet($data);
	}

	public function getList()
	{
		$billets = [];
		$q = $this->_db->query('
			SELECT billet_id, billet_date, billet_title, billet_content 
			FROM billets 
			ORDER BY id');
		while ($data = $q->fetch(PDO::FETCH_ASSOC))
		{
			$billets[] = new Billet($data);
		}
		return $billets;
	}
	public function update(Billet $billet)
	{
		$q = $this->_db->prepare('
			UPDATE billets 
			SET billet_date = :billet_date, billet_title = :billet_title, billet_content = :billet_content 
			WHERE id = :id');
		//asignation des valeurs
		//$q->bindValue(':billet_date', $billet->billet_date());//ici rajouter PDO::PARAMETRE DATE??
		$q->bindValue('billet_title', $billet->billet_title(), PDO::PARAM_STRING);// paramètre ok?
		$q->bindValue('billet_content', $billet->billet_content(), PDO::PARAM_STRING); // parametre ok?
		//$q->bindValue(':billet_id', $billet->billet_id(), PDO::PARAM_INT);
		//execution requête
		$q->execute();
	}

	public function setDB(PDO $db)
	{
		$this->_db = $db;
	}
}



$db = new PDO('mysql:host=localhost;dbname=projet3;charset=utf8', 'root', '');
$manager = new BilletManager($db);

$manager->add($billet);
