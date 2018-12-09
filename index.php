<?php

require 'modele.php';

try 
{
	$billets = getBillets();
	require 'accueilview.php';
}
catch (exception $e)
{
	$msgErreur = $e->getMessage();
	require 'erreurview.php';
}