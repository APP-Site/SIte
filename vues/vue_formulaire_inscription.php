<!DOCTYPE html>

<html>
    <head>
            <meta charset="UTF-8"/>
            <link rel="stylesheet" href="style.css">
            <title>Inscription</title>
    </head>
    
    <body>
    	<?php 
    	   $email=$_GET['email'];
    	   $code=$_GET['code'];
    	?>
    	<div id="page_inscription">
    		<h1>Inscription</h1>
    		<form method="post" action="../controleurs/controleur_inscription.php" id="formulaire_inscription" >
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
    				<label for="email">E-mail : </label><br>
    				<input type="text" id="email" name="email" size="30" value="<?php echo $email ?>">
    			</p>
    			<p>
    				<label for="telephone_portable">Telephone : </label><br>
    				<input type="tel" id="telephone-portable" name="telephone_portable" size="30">
    			</p>
    			<p>
    				<label for="pass">Mot de passe : </label><br>
    				<input type="password" id="pass" name="pass" size="30">
    			</p>
    			<p>
    				<label for="code">Code : </label><br>
    				<input type="text" id="code" name="code" size="30" value="<?php echo $code ?>">
    			</p>
    			<input type="submit" value="Valider" id="valider">
    		</form>
    	</div>
    	
    	<?php include("ppage.php"); ?>
    </body>