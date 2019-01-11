<?php namespace View;

require ("vendor/autoload.php");

use \Michelf\markdown;
use App\Modele;
?>

<!--titre de la page-->
<?php $this->title = ' "Connexion - Billet simple pour l\'Alaska" '; ?>

<!--contenu de la page-->
    <article>
    	<header>
            <h1 class="connexiontitle">
            Connectez-vous pour accéder à l'administration
            </h1>
            <p>Identifiant</p>
            <form method="post" action="index.php?action=admin&id=<?/*à ajouter id*/?>&pass=<?/*motdepasse*/?>"> 
                <input type="text" name="identifiant"/>
                <p>Mot de passe</p>
                <input type="text" name="motdepasse" /><br/>
                <input type="submit" value="Connexion"/>
            </form>
    	</header>
    </article>