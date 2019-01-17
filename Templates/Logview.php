<?php
namespace View;

require ("vendor/autoload.php");

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
            <form class="formconnexion" method="post" action=index.php?action=admin > 
                <input type="text" name="pseudo" placeholder="Pseudo" /><br/>
                <input type="text" name="password" placeholder="Mot de passe" /><br/>
                <input type="submit" value="Connexion"/>
            </form>
            <?php}
            ?>
    	</header>
    </article>
