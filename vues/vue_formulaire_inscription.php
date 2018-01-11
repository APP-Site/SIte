<?php $titre = "Inscription"; ?>

<?php ob_start(); ?>

    	<?php
    	   $email=$_GET['email'];
    	   $code=$_GET['code'];
    	?>
    	<div id="page_inscription">
    		<h1>Inscription</h1>
    		<form method="post" action="index.php?action=poste_inscription&email=<?= $email ?>&code=<?= $code ?>" id="formulaire_inscription" >
    			<p>
    				<label for="nom">Nom : </label><br>
    				<input type="text" id="nom" name="nom" size="30">
    			</p>
    			<p>
    				<label for="prenom">Prenom : </label><br>
    				<input type="text" id="prenom" name="prenom" size="30">
    			</p>
    			<p>
    				<label for="adresse">Adresse : </label><br>
    				<textarea id="adresse" name="adresse" rows="3" cols="26"></textarea>
    			</p>
    			<p>
    				<label for="code_postal">Code postal : </label><br>
    				<input type="text" id="code_postal" name="code_postal" size="30">
    			</p>
    			<p>
    				<label for="ville">Ville : </label><br>
    				<input type="text" id="ville" name="ville" size="30">
    			</p>
    			<p>
    				<label for="telephone_portable">Telephone : </label><br>
    				<input type="tel" id="telephone-portable" name="telephone_portable" size="30">
    			</p>
    			<p>
    				<label for="pass">Mot de passe : </label><br>
    				<input type="password" id="pass" name="pass" size="30">
    			</p>
    			<input type="submit" value="Valider" id="valider">
    		</form>
    	</div>

    	<?php include("pages_base/ppage.php"); ?>

<?php $content = ob_get_clean(); ?>
<?php require('vues/pages_base/base.php'); ?>
