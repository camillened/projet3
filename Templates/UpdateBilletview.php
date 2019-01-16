<?php namespace View;

require ("vendor/autoload.php");

use \Michelf\markdown;
use App\Modele;
?>

<!--titre de la page-->
<?php $this->title = ' Modification du billet - "Billet simple pour l\'Alaska" '; ?>

    <!--contenu de l'article-->
    <article>
    	<header>
            <h1 class="adminTitle">
            Modifier
            </h1>
    	</header>
    </article>

    <article>
        <form method="post" action="<?= "index.php?action=saveupdatebillet&id=" . $billet['billet_id'] ?>">
            <input name="title" type="text" placeholder="Titre du billet" value="<?=$billet['billet_title']?>" size="30" maxlength="150" required /> 
            <textarea id="mytextarea" name="content" value="<?=$billet['billet_content']?>" required></textarea>
            <input type="hidden" name="id" value="<?=$billet['billet_id']?>"/>
            <input type="submit" formnovalidate="true" value="Modifier" onclick="if(window.confirm('Voulez-vous vraiment modifier le billet ?')){return true;}else{return false;}" />
        </form>
    </article>

