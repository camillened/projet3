
<?php require('modele.php'); ?>

<?php $title = ' "Billet simple pour l\'Alaska"'; ?>

<?php ob_start(); ?>

	<h1>Bienvenue sur le blog de Jean Forteroche</h1>
	<p>Retrouvez ici les chapitres de mon livre "Billet simple pour l'Alaska" :</p>

	<?php
	foreach ($billets as $billet):
	?>

	    <article>
	    	<header>
	        <h3 class="billetTitle">
	            <a href="<?= "billet.php?id=" . $billet['id'] ?>"><!--lien vers billet-->
	            <?= htmlspecialchars($billet['billet_title']) ?>
	        	</a>
	        </h3>
	            <em>le <?= $billet['billet_date'] ?></em>
	    	</header>
	        
	        <p>
	            <?= nl2br(htmlspecialchars($billet['billet_content'])) ?><br />
	            <em><a href="post.php?id=<?= $billet['billet_id'] ?>">Commentaires</a></em>
	        </p>
	    </article>

	<?php
	endforeach;
	?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>


<!-- ?action=billet&billet_id=1-->