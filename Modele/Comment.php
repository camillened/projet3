<?php

require_once ('Controller/ModeleAutoloader.php');
ModeleAutoloader::register();

class Comment extends Modele 
{

  // Renvoie la liste des commentaires associés à un billet
  public function getComments($billet_id) 
  {
    $sql = 'SELECT comment_id, comment_date, comment_author, comment_content, billet_id FROM comments WHERE billet_id=?';
    $comments = $this->executerRequete($sql, array($billet_id));
    return $comments;

  }

  public function addComment ($author, $content, $billet_id)
  {
  	$sql = 'INSERT INTO comments (comment_date, comment_author, comment_content, billet_id)VALUES (?,?,?,?)';
  	$date = date("Y-m-d");//récupère la date
  	$this->executerRequete($sql, array($date, $author, $content, $billet_id));
  }

}
