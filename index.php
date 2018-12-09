<?php

require 'controller.php';

try 
{
  if (isset($_GET['action'])) 
  {
    if ($_GET['action'] == 'billet') 
    {
      if (isset($_GET['billet_id'])) 
      {
        $idBillet = intval($_GET['billet_id']);
        if ($idBillet != 0)
          billet($idBillet);
        else
          throw new Exception("Identifiant de billet non valide");
      }
      else
        throw new Exception("Identifiant de billet non défini");
    }
    else
      throw new Exception("Action non valide");
  }
  else 
  {
    accueil();  // action par défaut
  }
}
catch (Exception $e) {
    erreur($e->getMessage());
}