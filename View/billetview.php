
<?php require_once('Modele/Modele.php'); ?>

<?php $this->title = ' "Billet simple pour l\'Alaska" ' . $billet['billet_title']; ?>

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
        <?php foreach ($comments as $comment): ?>
	        <p>
	        	<?= htmlspecialchars($comment['comment_author']) ?>
	        </p>
	        <p>
	        	<?= htmlspecialchars($comment['comment_content']) ?>
	        </p>
		<?php endforeach; ?>
    </article>



<!-- ?action=billet&billet_id=1-->