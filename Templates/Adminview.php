<?php namespace View;

require ("vendor/autoload.php");

use \Michelf\markdown;
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
        <input type="submit" value="Nouveau billet"/>
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
            <!--modifier le billet-->
            <input type="submit" value="Modifier"/>
    </article>

    <?php
    endforeach;
    ?>