<?php
try
{
// connexion à la BDD

	$bdd = new PDO('mysql:host=localhost;dbname=projet3;charset=utf8', 'root', '');
}
catch (Excepetion $e)
{
//en cas d'erreur on stop
	die('Erreur : '.$e->getMessage());
}
//si tout va bien on continue

	$billets = $bdd->query('SELECT * FROM billets');
	$comments = $bdd->query('SELECT * FROM comments');

?>