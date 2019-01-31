<?php
namespace View;

require ("vendor/autoload.php");

use App\Modele;
?>

<!--titre de la page-->
<?php $this->title = ' "Connexion - Billet simple pour l\'Alaska" '; ?>

<!--contenu de la page-->
    <article>
    	<header>
        <div class="row">
          <div class="col-lg-3"></div>
          <form class="form-horizontal col-lg-6" method="post" action=index.php?action=connecte>
            <div class="form-group">
              <legend>Connectez-vous pour accéder à l'administration</legend>
            </div>
            <div class="row">
              <div class="form-group">
                <label for="text" class="col-lg-3 control-label">Identifiant :</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="text" name="login" placeholder="Identifiant" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="form-group">
                <label for="text" class="col-lg-3 control-label">Mot de passe :</label>
                <div class="col-lg-9">
                  <input type="password" class="form-control" id="text" name="password" placeholder="Mot de passe" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <label for="text" class="col-lg-3 control-label"></label>
                <div class="col-lg-9">
                  <button class="btn btn-sm btn-primary" type="submit" value="Connexion"/><span class="glyphicon glyphicon-ok-sign"></span> Connexion</button>
                </div>
              </div>
            </div>
          </form>
          <div class="col-lg-3"></div>
    	</header>
    </article>

