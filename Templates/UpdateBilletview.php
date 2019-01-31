<?php
namespace View;

require ("vendor/autoload.php");

use App\Modele;
?>

<!--titre de la page-->
<?php $this->title = ' Modification du billet - "Billet simple pour l\'Alaska" '; ?>

<!--contenu de l'article-->
<article>
	<header>
        <form method="post" action="index.php?action=admin">
            <h1 class="adminTitle">
            Modifier 
            <input type="submit" class="btn btn-sm btn-primary" formnovalidate="true" value="Quitter" onclick="if(window.confirm('Voulez-vous vraiment quitter ? Toutes les modifications seront perdues.')){return true;}else{return false;}" />
            </h1>
        </form>
	</header>
</article>

<article>
    <form method="post" action="<?= "index.php?action=saveupdatebillet&id=" . $billet['billet_id'] ?>" class="col-lg-12">
        <div class="form-group">
            <label for="texte">Titre </label>
            <input name="title" id="text" type="text" class="form-control" placeholder="Titre du billet" value="<?=$billet['billet_title']?>" maxlength="150" required /> 
        </div>
        <div class="form-group">
            <label for="textarea" >Contenu du billet </label>
            <textarea id="mytextarea" name="content" type="textarea" class="form-control" required><?=$billet['billet_content']?></textarea>
        </div>
        <input type="hidden" name="id" value="<?=$billet['billet_id']?>"/>
        <div class="form-group">
            <input type="submit" class="btn btn-sm btn-primary" formnovalidate="true" value="Modifier" onclick="if(window.confirm('Voulez-vous vraiment modifier le billet ?')){return true;}else{return false;}" />
        </div>
    </form>
</article>