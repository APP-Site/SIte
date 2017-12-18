<!DOCTYPE html>

<html>
    <head>
            <meta charset="UTF-8"/>
            <link rel="stylesheet" href="style.css">
            <title>Connexion</title>
    </head>
    
		<body>
			<div id="page_co">
				<h1>Connexion</h1>
				<form method="post" action="../controleurs/controleur_connexion.php">
					<p>
						<label for="email">E-mail :</label><br/>
						<input type="text" name="email" id="email"  size="30"/>
					</p>
					<p>
						<label for="pass">Mot de passe :</label><br/>
						<input type="password" name="pass" id="pass" size="30"/>
					</p>
	    			<input type="submit" value="Valider"/>
				</form>
			</div>
			<a href="vue_verifcation_inscription.php" id="inscription">Inscription</a>
			
			<?php include("ppage.php"); ?>

		</body>
</html>
