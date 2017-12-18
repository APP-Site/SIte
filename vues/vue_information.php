<?php session_start()?>

<!DOCTYPE html>
<?php 
    include('../modele/modele_connexion_bdd.php');
?>
<html>
    <head>
            <meta charset="UTF-8"/>
            <link rel="stylesheet" href="style.css"/>
           <title>Techn'O'Logis-Profil</title>
     </head>

    <body>

        <?php include("hpage.php"); ?>
		<?php include("navigation_client.php"); ?>

        <div class="corps">
        	<?php include("notification.php"); ?>
        	<div id="info_piece">
        		Liste des pieces : 
        		<ul>
        			<?php 
        			$donnee=htmlspecialchars($_SESSION['code']);
                    $reponse = $bdd->query('SELECT * FROM possession_piece INNER JOIN piece ON possession_piece.id_piece=piece.id WHERE code = "'.$donnee.'"');
            
                    while ($piece = $reponse->fetch())
                    {?>
                    	<li><?php echo $piece['nom']; ?></li>
                    <?php } ?>
        		</ul>
        		<a>Modifier</a>
        	</div>

		</div>
        <?php include("ppage.php"); ?>

    </body>