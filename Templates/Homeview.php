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
            <h3>
                <a href="<?= "index.php?action=billet&id=" . $billet['billet_id'] ?>"><!--lien vers un billet-->
                <?= htmlspecialchars($billet['billet_title']) ?>
        	    </a>
            </h3>
                <strong>Publié le <?= $billet['billet_date'] ?></strong>
    	</header>
        
        <p>
            <?= nl2br($billet['billet_content']) ?><br />
        </p>
    </article>

<?php
endforeach;
?>