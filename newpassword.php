<?php
//si aucun mot de passe saisi on propose un formulaire de saisie
if (!isset($_POST['password']) AND !isset($_POST['pseudo'])) {
?>

	<p>Veuillez entrer un mot de passe à hacher :</p>
	<form method="POST" action="newpassword.php">
		<input type="text" name="pseudo" placeholder="Pseudo (Max 20 caract.)" size="30" maxlength="20" required \><br/>
		<input type="text" name="password" placeholder="Mot de passe (Max 20 caract.)" size="30" maxlength="20" required \><br/>
		<input type="submit" name="Go"\>
	</form>

<?php
//si on rentre un mdp, on retourne le résultat sécurisé
} else {
	$userpass = $_POST ['pseudo'];
	$passtext = $_POST['password'];
	//on sale le mdp
	$passsalt = "kL18" . $passtext . '*12cbg';
	//on hache le mdp salé
	$passhash = sha1($passsalt);
?>
	<p>Bonjour <?= htmlspecialchars($userpass)?></p>
	<p>Votre mot de passe initial : <?= htmlspecialchars($passtext)?><br/>
	Votre mot de passe sécurisé : <?=htmlspecialchars($passhash)?></p>

<?php
}
?>