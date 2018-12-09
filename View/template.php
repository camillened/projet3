<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
    <title><?= $title ?></title>
  </head>
  <body>
    <div id="all">
      <header id="header">
        <a href="index.php"><h1 id="titreBlog">Billet simple pour l'Alaska</h1></a>
      </header><!-- #header -->

      <div id="content">
        <?= $content ?>
      </div> <!-- #content -->

      <footer id="footer">
        <p><a href="   lien Connexion   ">Connexion</a></p>
      </footer> <!-- #footer -->
    </div> <!-- #all -->
  </body>
</html>