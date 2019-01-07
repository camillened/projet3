<?php require_once('Modele/Modele.php'); ?>

<!--titre de la page-->
<?php $this->title = ' "Connexion - Billet simple pour l\'Alaska" '; ?>

<!--contenu de la page-->
    <article>
    	<header>
            <h1 class="connexion">
            Connectez-vous pour accéder à l'administration
            </h1>
            <p>Identifiant</p>
            <input type="text" name="identifiant"/>
            <p>Mot de passe</p>
            <input type="text" name="motdepasse" /><br/>
            <input type="submit" value="Me connecter"/>
    	</header>
    </article>