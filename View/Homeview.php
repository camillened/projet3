
<?php require('Modele/Modele.php'); ?>

<?php $this->$title = ' "Billet simple pour l\'Alaska"'; ?>

	<h1>Bienvenue sur le blog de Jean Forteroche</h1>
	<p>Retrouvez ici les chapitres de mon livre "Billet simple pour l'Alaska" :</p>

	<?php
	foreach ($billets as $billet):
	?>

	    <article>
	    	<header>
	        <h3 class="billetTitle">
	            <a href="<?= "index.php?action=billet&id=" . $billet['billet_id'] ?>"><!--lien vers un billet-->
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

<!-- ?action=billet&billet_id=1-->