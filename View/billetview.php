
<?php require 'Modele/Modele.php'; ?>

<?php $title = ' "Billet simple pour l\'Alaska" ' $billet['billet_title']; ?>

<?php ob_start(); ?>

    <article>
    	<header>
        
        <h1 class="billetTitle">
            <?= htmlspecialchars($billet['billet_title']) ?>
        </h3>

            <em>le <?= $billet['billet_date'] ?></em>
    	</header>
        <p><?= $billet['billet_content'] ?></p>
    </article>
    <article>
        <h2 id="titrecommentaires">Commentaires sur l'article</h2>
        <?php foreach ($commentaires as $commentaire): ?>
	        <p>
	        	<?= htmlspecialchars($billet['comment_author']) ?>
	        </p>
	        <p>
	        	<?= htmlspecialchars($billet['comment_content']) ?>
	        </p>
		<?php endforeach; ?>
    </article>
<?php $content = ob_get_clean(); ?>

<?php require 'View/Template.php'; ?>