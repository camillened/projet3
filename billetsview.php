
<?php require('modele.php'); ?> <!--Ne fonctionne quand lorsqu'il est au début ?-->

<?php $title = ' "Billet simple pour l\'Alaska"'; ?>

<?php ob_start(); ?>

	<h1>Bienvenue sur le blog de Jean Forteroche</h1>
	<p>Retrouvez ici les chapitres de mon livre "Billet simple pour l'Alaska" :</p>

	<?php
	while ($donnees = $billets->fetch())
	{
	?>

	    <div class="news">
	        <h3>
	            <?= htmlspecialchars($donnees['billet_title']) ?>
	            <em>le <?= $donnees['billet_date'] ?></em>
	        </h3>
	        
	        <p>
	            <?= nl2br(htmlspecialchars($donnees['billet_content'])) ?><br />
	            <em><a href="post.php?id=<?= $donnees['billet_id'] ?>">Commentaires</a></em>
	        </p>
	    </div>

	<?php
	}
	$billets->closeCursor();
	?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>