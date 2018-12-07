<?php
//on enregistre l'autoload (qui sert a appeler la bonne classe)
function loadClass($classname)
{
	require $classname.'.php';
}

spl_autoload_register('loadClass');

$manager = new BilletsManager($db);

if(isset($_POST['creer']) && isset($_POST['billet_title']) && isset($_POST['billet_date']) && isset($_POST['billet_content'])); //si on veut "creer" un billet
{
	$billet = new Billet(['billet_title' => $_POST['billet_title']]);//alors on créé le billet
	$manager->add($billet); //on demande au manager d'ajouter le billet à la bdd
	$message = 'billet ajouté';
}/*
else
{
	$message  = 'Erreur : le billet n\'a pas été ajouté';
}*/