<?php namespace View;

require ("vendor/autoload.php");

use \Michelf\markdown;
use App\Modele;
?>

<!--titre de la page-->
<?php $this->title = ' Nouvel article - "Billet simple pour l\'Alaska" '; ?>

    <!--contenu de l'article-->
    <article>
    	<header>
            <h1 class="adminTitle">
            Nouveau billet
            </h1>
    	</header>
    </article>

    <article>
        <form method="post" action="index.php?action=savenewbillet">
            <input name="title" type="text" placeholder="Titre du billet" size="30" maxlength="150" required /> 
            <textarea id="mytextarea" name="content" required></textarea>
            <input type="submit" formnovalidate="true" value="Publier" onclick="if(window.confirm('Voulez-vous vraiment publier le billet ?')){return true;}else{return false;}" />
        </form>
    </article>