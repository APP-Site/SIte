<!DOCTYPE html>
<html>
    <head>
            <meta charset="UTF-8"/>
            <link rel="stylesheet" href="style.css"/>
           <title>Techn'O'Logis-Service client</title>
     </head>
    
    <body class="body">    
      
              
        <?php include("hpage.php"); ?>
        <?php include("navigation_sav.php"); ?>
        
        <div class="corps">
		<?php include("notification.php"); ?>
		
		<section id="information">
			<form method="get">
				<label for="search">Recherche client: </label><input type="search" name="search" id="search" placeholder="Inserer code client">
				<input type="submit" value="Rechercher">
			</form>
			
			
			<?php

$bdd = new PDO('mysql:host=localhost;dbname=domisep;charset=utf8', 'root', 'root');

if (isset($_GET['search']))
{
    $code=htmlspecialchars($_GET['search']);
    $reponse = $bdd->query('SELECT * FROM utilisateur WHERE code = "'.$code.'"');
    $client=$reponse->fetch(); ?>

			<article id="info">
				<h3>Information client</h3>
				<ul>
					<li>Nom: <?php echo $client['nom'];?> <?php echo $client['prenom'];?></li>
					<li>Adresse: <?php echo $client['adresse'];?> <?php echo $client['code_postal']?> <?php echo $client['ville']?></li>
					<li>Telephone: <?php echo $client['telephone_portable'];?></li>
					<li>E-mail: <?php echo $client['email'];?></li>
				</ul>
			</article>
		</section>
		
		<section>
			<ul id="consigne">
				<li class="bloc"><h2><a>Etat des capteurs</a></h2></li>
				<li class="bloc"><h2><a>Tests</a></h2></li>
				<li class="bloc"><h2><a>Historique</a></h2></li>
			</ul>
<?php }?>
		</section>
		</div>
		
        <?php include("ppage.php"); ?>
        
    </body>
</html>