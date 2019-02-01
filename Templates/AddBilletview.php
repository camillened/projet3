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
        <form method="post" action="index.php?action=admin">
            <h1 class="adminTitle">
            Nouveau billet
            <input type="submit" class="btn btn-sm btn-primary" formnovalidate="true" value="Annuler" onclick="if(window.confirm('Voulez-vous vraiment annuler ? Toutes les modifications seront perdues.')){return true;}else{return false;}" />
            </h1>
        </form>
	</header>
</article>

<article>
    <form method="post" action="index.php?action=savenewbillet" class="col-lg-12">
            <div class="form-group">
                <label for="texte">Titre </label>
                <input name="title" type="text" class="form-control" placeholder="Titre du billet" size="30" maxlength="150" required /> 
            </div>
            <div class="form-group">
                <label for="textarea" >Contenu du billet </label>
                <textarea id="mytextarea" name="content" type="textarea" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-sm btn-primary" formnovalidate="true" value="Publier" onclick="if(window.confirm('Voulez-vous vraiment publier le billet ?')){return true;}else{return false;}" />
            </div>
    </form>
</article>