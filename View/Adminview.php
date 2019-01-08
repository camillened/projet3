<?php require_once('Modele/Modele.php'); ?>

<!--titre de la page-->
<?php $this->title = ' "Administration - Billet simple pour l\'Alaska" '; ?>

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
            <h3 class="billetTitle">
            <a href="<?= "index.php?action=billet&id=" . $billet['billet_id'] ?>"><!--lien vers un billet-->
            <?= htmlspecialchars($billet['billet_title']) ?>
            </a>
            </h3>
            <em>le <?= $billet['billet_date'] ?></em>
            <input type="submit" value="Modifier"/>
    </article>

    <?php
    endforeach;
    ?>