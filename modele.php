

<?php
// Renvoie la liste de tous les billets
function getBillets() 
{
  $db = getDb();
  $billets = $db->query('SELECT billet_id, billet_date, billet_title, billet_content FROM billets ORDER BY billet_id DESC');
  return $billets;
}


// connexion à la DB
// Instancie et renvoie l'objet PDO associé
try
{
	function getDb() 
	{
	$db = new PDO('mysql:host=localhost;dbname=projet3;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING)); // On émet une alerte à chaque fois qu'une requête a échoué.
	return $db;
	}
}
catch (exception $e) //en cas d'erreur on stop et on affiche l'erreur
{
	$msgErreur = $e->getMessage();
	require 'vueerreur.php';
}
//si tout va bien on continue


// Renvoie les informations sur un billet
function getBillet($billet_id) {
  $db = getDb();
  $billets = $bdd->prepare('SELECT billet_id, billet_date, billet_title, billet_content FROM billets WHERE billet_id=?');
  $billets->execute(array($billet_id));
  if ($billets->rowCount() == 1)
    return $billets->fetch();  // Accès à la première ligne de résultat
  else
   throw new Exception("Aucun billet ne correspond à l'identifiant '$billet_id'");
}

// Renvoie la liste des commentaires associés à un billet
function getComments($billet_id) {
  $db = getDb();
  $comments = $db->prepare('SELECT comment_id, comment_date, comment_author, comment_title, billet_id FROM comments WHERE billet_id=?');
  $comments->execute(array($billet_id));
  return $comments;
}