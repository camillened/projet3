<?php
namespace View;

require ("vendor/autoload.php");

use App\Modele;
?>

<!--titre de la page-->
<?php $this->title = ' "Billet simple pour l\'Alaska" ' . $billet['billet_title']; ?>

<!--contenu de l'article-->
<article>
	<header>
        <h3>
        <?= htmlspecialchars($billet['billet_title']) ?>
        </h3>
        <em>le <?= htmlspecialchars($billet['billet_date']) ?></em>
	</header>
    <p><?= $billet['billet_content'] ?></p>
</article>

<!-- commentaires sur l'article-->
<article>
    <h2 id="titrecommentaires">Commentaires sur l'article</h2>
    <div class="borderbox">
        <?php foreach ($comments as $comment): ?>
            <div class="onecomment">
                <em><?= htmlspecialchars($comment['comment_author']) ?></em> le <?= htmlspecialchars($comment['comment_date']) ?>
                <p>
                	<?= htmlspecialchars($comment['comment_content']) ?>
                </p>
                <!-- signaler un commentaire -->
                <form method="post" action="index.php?action=report">
                    <input type="hidden" name="comment_id" value="<?=$comment['comment_id']?>"/>
                    <input type="hidden" name="comment_priority" value="<?=$comment['comment_priority']?>"/>
                    <input type="hidden" name="billet_id" value="<?=$billet['billet_id']?>"/>
                    <input type="submit" class="btn btn-sm btn-primary" value="Signaler"/>
                </form>
            </div>
    	<?php endforeach; ?>
    </div>
</article>

<!-- formulaire d'ajout d'un commentaire-->
<article>
    <h2 id="titrecommentaires">Laissez-moi un commentaire !</h2>
    <form method="post" action="index.php?action=comment" class="col-lg-12 borderbox"> 
        <div class="form-group">
            <label for="texte">Nom </label>
            <input id="author" name="author" type="text" placeholder="Votre nom" class="form-control" maxlength="20" required />
        </div>
        <div class="form-group">
            <label for="textarea" >Contenu du billet </label>
            <textarea id="contentComment" name="content" rows="4" placeholder="Votre commentaire (max.500caract.)" size="30" maxlength="500"  class="form-control" required></textarea>
        </div>
        <input type="hidden" name="id" value="<?=$billet['billet_id']?>"/>
        <div class="form-group">
            <input type="submit" class="btn btn-sm btn-primary" value="Commenter"/>
        </div>
    </form>    
</article>