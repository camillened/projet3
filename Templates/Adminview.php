<?php
namespace View;

require ("vendor/autoload.php");

use App\Modele;
?>

<!--titre de la page-->
<?php $this->title = ' Administration - "Billet simple pour l\'Alaska" '; ?>

<!--contenu de la page-->


<article>
	<header>
        <h1> 
            <form method="post" action="index.php?action=deconnexion">
            Administration 
            <input class="btn btn-sm btn-primary"  type="submit" value="Déconnexion" onclick="if(window.confirm('Voulez-vous vraiment vous déconnecter ?')){return true;}else{return false;}">
            </form>
        </h1>
	</header>
</article>

<div class="row">
<article class="col-xs-12 col-sm-12 col-lg-6">
    <h2>
        <form method="post" action="index.php?action=addbillet">
        Gestion des billets 
        <input class="btn btn-sm btn-primary" type="submit" value="Nouveau billet"/>
        </form>
    </h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Publication</th>
                <th>Action</th>
            </tr>
        </thead>
    <?php 
    foreach ($billets as $billet): 
    ?>

        <tbody>
            <tr>
                <td>
                    <h3 class="billetTitle"><!--lien vers un billet-->
                    <a href="<?= "index.php?action=billet&id=" . $billet['billet_id'] ?>">
                    <?= htmlspecialchars($billet['billet_title']) ?> </a>
                    </h3>
                </td>
                <td>
                    <em><?= $billet['billet_date']?></em>
                </td>
                <td>
                    <!--modifier ou supprimer le billet-->
                    <form  method="post" action="<?= "index.php?action=updatebillet&id=" . $billet['billet_id'] ?>">
                    <input class="btn btn-sm btn-primary" type="submit" value="Modifier"/><br/>
                    </form>
                    <form method="post" action="<?= "index.php?action=deletebillet&id=" . $billet['billet_id']  ?>" onclick="if(window.confirm('Voulez-vous vraiment supprimer ?')){return true;}else{return false;}">
                    <input class="btn btn-sm btn-primary" type="submit" value="Supprimer"/>
                    </form>
                </td>
            </tr>
        </tbody>
    <?php
    endforeach;
    ?>
    </table>
</article>



<article class="col-xs-12 col-sm-12 col-lg-6">
    <h2>
        Commentaires à valider
    </h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Auteur</th>
                <th>Date</th>
                <th>Commentaire</th>
                <th>Signalements</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php 
        foreach ($comments as $comment): 
        ?>

        <tbody>
            <tr>
                <td><?= $comment['comment_author'] ?></td>
                <td><?= $comment['comment_date']?></td>
                <td><?= $comment['comment_content']?></td>
                <td><?= $comment['comment_priority']?></td>
                <td><!--supprime un commentaire-->
                    <form method="post" action="<?= "index.php?action=deletecomment&id=" . $comment['comment_id']  ?>" onclick="if(window.confirm('Voulez-vous vraiment supprimer ce commentaire ?')){return true;}else{return false;}">
                    <input class="btn btn-sm btn-primary" type="submit" value="Supprimer"/></form>
                    </form>
                    <!--valide un commentaire-->
                    <form method="post" action="<?= "index.php?action=validcomment&id=" . $comment['comment_id']  ?>" onclick="if(window.confirm('Voulez-vous vraiment supprimer ce commentaire ?')){return true;}else{return false;}">
                    <input class="btn btn-sm btn-primary" type="submit" value="Approuver"/></form>
                </td>
            </tr>
        </tbody>
        <?php
        endforeach;
        ?>
    </table>
</article>



</div><!--row-->