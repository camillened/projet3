<?php namespace View;

require ("vendor/autoload.php");

use \Michelf\markdown;
use App\Modele;

$title = '"Billet simple pour l\'Alaska"'; ?>

<?php ob_start() ?>
<p>Une erreur est survenue : <?= $msgErreur ?></p>
<?php $content = ob_get_clean(); ?>

<?php require_once ('Templates/Template.php'); ?>