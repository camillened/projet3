<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--on ouvre la fenetre à la largeur de l'écran (pour les smartphones)-->
    <link rel="stylesheet" href="css/bootstrap/css/style.css" >
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.css" >
    <!--Tiny MCE-->
    <script type="text/javascript" src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script type="text/javascript">tinymce.init({
    menubar: false,
    selector: '#mytextarea'
    });</script>
    <title><?= $title ?></title>
  </head>
  <body>
    <div id="allfluid" class="container-fluid">
      <header id="header">
        <h1 id="maintitle"><a href="index.php">"Billet simple pour l'Alaska" par Jean Forteroche</a></h1>
        <h2 id="subtitle">Bienvenue dans un voyage extraordinaire</h2>
      </header><!-- #header -->

    <div id="all" class="container">


      <div id="content" class="container row">
        <div class="col-lg12">
        <?= $content ?>
        </div>
      </div> <!-- #content -->

      <footer id="footer" class="row">
        <div class="col-xs-12 col-sm-6">
          <p><a href="index.php?action=admin">Administration</a></p>
        </div>
        <div class="col-xs-12 col-sm-6">
          © 2018 Copyright | Développé par Camille Nedjar Pour Jean Forteroche
        </div>
      </footer> <!-- #footer -->
    </div> <!-- #all -->
    </div><!--#allfluid-->
  </body>
</html>