<?php
namespace View;

require ("vendor/autoload.php");

use App\Modele;
?>

<!--titre de la page-->
<?php $this->title = ' Administration - "Billet simple pour l\'Alaska" '; ?>

    <!--contenu de l'article-->
    <article>
    	<header>
            <h1 class="adminTitle">
            Administration
            </h1>
    	</header>
    </article>

    <article>
        <form  method="post" action="<?= "index.php?action=addbillet"?>">
        <input type="submit" value="Nouveau billet"/>
        </form>
    </article>

    <article>
        <?php 
        foreach ($billets as $billet): 
        ?>
            <h3 class="billetTitle"><!--lien vers un billet-->
            <a href="<?= "index.php?action=billet&id=" . $billet['billet_id'] ?>">
            <?= htmlspecialchars($billet['billet_title']) ?> </a>
            </h3>
            <em>Publié le <?= $billet['billet_date'] ?></em>
            <!--modifier ou supprimer le billet-->
            <form  method="post" action="<?= "index.php?action=updatebillet&id=" . $billet['billet_id'] ?>">
            <input type="submit" value="Modifier"/><br/>
            </form>
            <form method="post" action="<?= "index.php?action=deletebillet&id=" . $billet['billet_id']  ?>" onclick="if(window.confirm('Voulez-vous vraiment supprimer ?')){return true;}else{return false;}">
            <input type="submit" value="Supprimer"/>
            </form>
    </article>
        <?php
        endforeach;
        ?>

    <article>
        <h3 class="billetTitle">
            Commentaires à valider
        </h3>
        <?php 
        foreach ($comments as $comment): 
        ?>
            <p>Auteur : <?= $comment['comment_author'] ?> <br/>
            Commentaire : <?= $comment['comment_content'] ?> <br/>
            Publié le : <?= $comment['comment_date'] ?> </p>
        </article>

        <?php
        endforeach;
        ?>