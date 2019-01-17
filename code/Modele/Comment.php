<?php
namespace App\Modele;

class Comment extends Modele 
{

  // Renvoie la liste des commentaires associés à un billet
  public function getComments($billet_id) 
  {
    $sql = 'SELECT comment_id, comment_date, comment_author, comment_content, billet_id, comment_statut, comment_priority FROM comments WHERE billet_id=?';
    $comments = $this->executerRequete($sql, array($billet_id));
    return $comments;
  }

  public function modComment()//renvoie les commentaires à modérer
  {
    $sql = 'SELECT comment_id, comment_date, comment_author, comment_content, billet_id, comment_statut, comment_priority FROM comments WHERE comment_statut="attente" ORDER BY comment_priority DESC';
    $comments = $this->executerRequete($sql);
    return $comments;
  }

  public function addComment ($author, $content, $billet_id)
  {
  	$sql = 'INSERT INTO comments (comment_date, comment_author, comment_content, billet_id) VALUES (?,?,?,?)';
  	$date = date("Y-m-d");//récupère la date
  	$this->executerRequete($sql, array($date, $author, $content, $billet_id));
  }

  public function reportComment($comment_priority, $comment_id)
  {
    $sql = 'UPDATE comments SET comment_priority=? WHERE comment_id=?';
    $comment_priority = 1;
    $this->executerRequete($sql, array($comment_priority, $comment_id));
  }

}
