<?php
require ("vendor/autoload.php");

use \Michelf\markdown;
use App\Controller\Routeur;

$routeur = new Routeur();
$routeur->routerRequete();