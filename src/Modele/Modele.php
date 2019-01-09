<?php namespace App\Modele;

require ("vendor/autoload.php");

use \Michelf\markdown;

//la classe modele est abstraite : fourni à ses classes dérivées un service d'exécution d'une requête sql

abstract class Modele 
{

  private $db; // objet PDO d'accès à la DB

  protected function executerRequete ($sql, $params = null)//execute une requete sql éventuellement paramétrée
  {
    if ($params == null)//ex : pas de n° id  -> exécution directe
    {
      $resultat = $this->getDb()->query($sql);
    }
    else//ex : on a un id billet -> requête préparée
    {
      $resultat = $this->getDb()->prepare($sql);
      $resultat->execute($params);
    }
    return $resultat;
  }

  private function getDb()
  {
    if ($this->db == null)//création de la connexion
    {
      $this->db = new PDO('mysql:host=localhost;dbname=projet3;charset=utf8',
          'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    return $this->db;
  }

}