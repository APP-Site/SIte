<!DOCTYPE html>


<html>
    <head>
            <meta charset="UTF-8"/>
            <link rel="stylesheet" href="style.css">
            <title>1ere connexion</title>
                  
    </head>

    <body>

    	<div id="page_verif">
    		<p>	<h1>Verification du code</h1>
    			Si c'est votre première connection veuillez récuperer le code fourni lors de votre premier achat pour vous inscrire
    		</p>
      		<form method="post" action="../controleurs/controleur_verification_inscription.php">
      			<p>
      				<label for="email">E-mail :</label><br>
      				<input type="text" name="email"   size="30" />
      			</p>
      			<p>
      				<label for="code">Code :</label><br>
      				<input type="text" name="code"  size="30" />
       			</p>
          			<input type="submit" value="Valider"/>
    		</form>
    	</div>

    	<?php include("ppage.php"); ?>
    </body>
 </html>
