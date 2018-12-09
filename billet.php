<?php

require 'modele.php';

try
{
	if isset ($_GET['billet_id']))
	{    // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
		$billet_id = intval($_GET['billet_id']);
		if ($billet_id != 0) {
			$billet = getBillet($billet_id);
			$comments = getComments($billet_id);
			require 'billetview.php';
		}
		else
			throw new Exception("Identifiant de billet incorrect");
	}
	else
	{
		throw new Exception("Aucun identifiant de billet");
		
	}
}
catch (Exception $e)
{
	$msgErreur = $e->getMessage();
	require 'erreurview.php';
}