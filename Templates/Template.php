<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--on ouvre la fenetre à la largeur de l'écran (pour les smartphones)-->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <title><?= $title ?></title>
  </head>
  <body>
    <div id="all" class="container">
      <header id="header">
          <a href="index.php"><h1 id="titreBlog">Billet simple pour l'Alaska</h1></a>
      </header><!-- #header -->

      <div id="content" class="row">
        <div class="col-lg12">
        <?= $content ?>
        </div>
      </div> <!-- #content -->

      <footer id="footer" class="row">
        <div class="col-xs-12 col-sm-6">
          <p><a href="index.php?action=login">Administration</a></p>
        </div>
        <div class="col-xs-12 col-sm-6">
          © 2018 Copyright | Développé par Camille Nedjar Pour Jean Forteroche
        </div>
      </footer> <!-- #footer -->
    </div> <!-- #all -->
  </body>
</html>