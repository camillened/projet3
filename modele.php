<?php
try
{
// connexion à la BDD

	$db = new PDO('mysql:host=localhost;dbname=projet3;charset=utf8', 'root', '');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.
}
catch (Excepetion $e)
{
//en cas d'erreur on stop
	die('Erreur : '.$e->getMessage());
}
//si tout va bien on continue

	$billets = $db->query('SELECT * FROM billets');
	$comments = $db->query('SELECT * FROM comments');
