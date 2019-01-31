<?php
namespace View;

require ("vendor/autoload.php");

use App\Modele;
?>

<?php $this->title = ' Billet simple pour l\'Alaska '; ?>

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
                <em>Publié le <?= $billet['billet_date'] ?></em>
    	</header>
        
        <p>
            <?= nl2br($billet['billet_content']) ?><br />
        </p>
    </article>

<?php
endforeach;
?>