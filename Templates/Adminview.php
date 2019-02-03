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
        <h1 id="admintitle" class="borderbox"> 
            Administration 
        <form method="post" action="index.php?action=deconnexion">
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
        <button class="btn btn-sm btn-primary" type="submit"><span class="glyphicon glyphicon-plus"></span></button>

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
                <td class="table-line">
                    <h3 class="billetTitle"><!--lien vers un billet-->
                    <a href="<?= "index.php?action=billet&id=" . $billet['billet_id'] ?>">
                    <?= htmlspecialchars($billet['billet_title']) ?> </a>
                    </h3>
                </td>
                <td class="table-line">
                    <em><?= htmlspecialchars($billet['billet_date'])?></em>
                </td>
                <td class="table-line">
                    <!--modifier ou supprimer le billet-->
                    <form  method="post" action="<?= "index.php?action=updatebillet&id=" . $billet['billet_id'] ?>">
                    <button class="btn btn-sm btn-primary" type="submit"><span class="glyphicon glyphicon-pencil"></span></button><br/>
                    </form>
                    <form method="post" action="<?= "index.php?action=deletebillet&id=" . $billet['billet_id']  ?>" onclick="if(window.confirm('Voulez-vous vraiment supprimer ?')){return true;}else{return false;}">
                    <button class="btn btn-sm btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
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
                <td class="table-line"><?= htmlspecialchars($comment['comment_author']) ?></td>
                <td class="table-line"><?= htmlspecialchars($comment['comment_date'])?></td>
                <td class="table-line"><?= htmlspecialchars($comment['comment_content'])?></td>
                <td class="table-line"><?= htmlspecialchars($comment['comment_priority'])?></td>
                <td class="table-line"><!--supprime un commentaire-->
                    <form method="post" action="<?= "index.php?action=deletecomment&id=" . $comment['comment_id']  ?>" onclick="if(window.confirm('Voulez-vous vraiment supprimer ce commentaire ?')){return true;}else{return false;}">
                    <button class="btn btn-danger btn-sm" type="submit"><span class="glyphicon glyphicon-remove "></span></button></form>
                    </form>
                    <!--valide un commentaire-->
                    <form method="post" action="<?= "index.php?action=validcomment&id=" . $comment['comment_id']  ?>" onclick="if(window.confirm('Voulez-vous vraiment valider ce commentaire ?')){return true;}else{return false;}">
                    <button class="btn btn-sm btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span></button></form>
                </td>
            </tr>
        </tbody>
        <?php
        endforeach;
        ?>
    </table>
</article>



</div><!--row-->