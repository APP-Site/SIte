<?php session_start()?>
<?php include('../modele/modele_connexion_bdd.php');?>

<!DOCTYPE html>
<html>
    <head>
            <meta charset="UTF-8"/>
            <link rel="stylesheet" href="style.css"/>
           <title>Techn'O'Logis-Tableau de Bord</title>
     </head>

    <body>

        <?php include("hpage.php"); ?>
		    <?php include("navigation_client.php"); ?>

        <div class="corps">
        	<?php include("notification.php"); ?>

        	<section class="corps_page">
				<article class="trois">
            		<div class="dropdown">
  						<div class="etape"><span>Choisissez une pièce où l'installer</span></div>
  						<div class="dropdown-content">
    					<form method="post" action="../controleurs/controleur_ajout_actionneur.php">
      						<label for="piece">Pièce : </label>
        					<select name="piece">
                    <?php
                    include('../modele/modele_connexion_bdd.php');
                    $reponse = $bdd->query('SELECT nom_piece FROM possession_piece WHERE code = "'.$_SESSION['code'].'"');

                    while ($donnees = $reponse->fetch())
                    {
                      echo ' <option value = ' . $donnees['nom_piece'] . '>' . $donnees['nom_piece'] . '</option>';
                    }
                    $reponse -> closeCursor();
                     ?>
        					</select>
      						<input type="submit" value="Suivant" />
    					</form>
  						</div>
					</div>
            	</article>

              <?php
            	$code=htmlspecialchars($_SESSION['code']);
                $reponse = $bdd->query('SELECT * FROM possession_piece  WHERE code = "'.$code.'"');

                while ($piece = $reponse->fetch())
                { ?>
                    <article class="onglet">
                    	<div>
                		  	<header><?php echo $piece['nom_piece']; ?></header>
                       		<ul>
                       			<?php
                       			$data=htmlspecialchars($piece['nom_piece']);
                       			$resultat = $bdd->query('SELECT * FROM possession_capteur_actionneur, capteur_actionneur WHERE possession_capteur_actionneur.id_capteur_actionneur = capteur_actionneur.id AND code = "'.$code.'" ');
                       			while ($objet = $resultat->fetch())
                       			{
                       			  if ($data==$objet['nom_piece'])
                       			  {
                       			      $data2=htmlspecialchars($objet['id']);
                       			      $donnee = $bdd->query('SELECT valeur FROM donnee WHERE id_possession_capteur_actionneur = "'.$data2.'" ');
                       			      $valeur = $donnee->fetch();?>
                       				<li><img src="<?php echo $objet['image'];?>"><br><?php echo $valeur['valeur']?> <?php echo $objet['unite'];?></li>
                       			<?php }}?>
                       		</ul>
                    	</div>
                	</article>
                <?php }?>

        	</section>
        </div>

        <?php include("ppage.php"); ?>

    </body>
