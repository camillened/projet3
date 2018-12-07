<?php
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Essai d'ajout d'un billet</title>
    
    <meta charset="utf-8" />
  </head>
  <body>
    <form action="" method="post">
      <p>
        Title : <input type="text" name="billet_title" maxlength="255" />
        Date : <input type="date" name="billet_date" maxlength="50" />
        Content : <input type="text" name="billet_content" />
        <input type="submit" value="Créer ce billet" name="creer" />
        <?= $message ?>
      </p>
    </form>
  </body>
</html>