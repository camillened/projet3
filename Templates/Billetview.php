<?php namespace View;

require ("vendor/autoload.php");

use \Michelf\markdown;
use App\Modele;
?>

<!--titre de la page-->
<?php $this->title = ' "Billet simple pour l\'Alaska" ' . $billet['billet_title']; ?>

    <!--contenu de l'article-->
    <article>
    	<header>
            <h1 class="billetTitle">
            <?= htmlspecialchars($billet['billet_title']) ?>
            </h1>
            <em>le <?= $billet['billet_date'] ?></em>
    	</header>
        <p><?= $billet['billet_content'] ?></p>
    </article>

    <!-- commentaires sur l'article-->
    <article>
        <h2 id="titrecommentaires">Commentaires sur l'article</h2>
        <?php foreach ($comments as $comment): ?>
	        <p>
	        	<?= htmlspecialchars($comment['comment_author']) ?>
	        </p>
	        <p>
	        	<?= htmlspecialchars($comment['comment_content']) ?>
	        </p>
		<?php endforeach; ?>
    </article>

    <!-- formulaire d'ajout d'un commentaire-->
    <article>
        <form method="post" action="index.php?action=comment"> 
            <input id="author" name="author" type="text" placeholder="Votre nom" required /><br/>
            <textarea id="contentComment" name="content" rows="4" placeholder="Votre commentaire" required></textarea><br/>
            <input type="hidden" name="id" value="<?=$billet['billet_id']?>"/>
            <input type="submit" value="Commenter"/>
        </form>    
    </article>
    