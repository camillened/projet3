<?php
namespace View;

require ("vendor/autoload.php");

use App\Modele;
?>

<!--titre de la page-->
<?php $this->title = ' Nouvel article - "Billet simple pour l\'Alaska" '; ?>

<!--contenu de la page-->
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
        <input type="submit" class="btn btn-sm btn-primary" formnovalidate="true" value="Publier" onclick="if(window.confirm('Voulez-vous vraiment publier le billet ?')){return true;}else{return false;}" />
    </form> 
    <form method="post" action="index.php?action=admin">
        <input type="submit" class="btn btn-sm btn-primary" formnovalidate="true" value="Annuler" onclick="if(window.confirm('Voulez-vous vraiment annuler ? Toutes les modifications seront perdues.')){return true;}else{return false;}" />
    </form>
</article>