<?php

require_once 'Modele/Modele.php';

class Comment extends Modele 
{

  // Renvoie la liste des commentaires associés à un billet
  public function getComments($billet_id) 
  {
    $sql = 'SELECT comment_id, comment_date, comment_author, comment_content, billet_id FROM comments WHERE billet_id=?';
    $comments = $this->executerRequete($sql, array($billet_id));
    return $comments;

  }
}
