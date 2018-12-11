<?php

require 'Controller/Controller.php';

try 
{
  if (isset($_GET['action'])) 
  {
    if ($_GET['action'] == 'billet') 
    {
      if (isset($_GET['billet_id'])) 
      {
        $billet_id = intval($_GET['billet_id']);
        if ($billet_id != 0)
          billet($billet_id);
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