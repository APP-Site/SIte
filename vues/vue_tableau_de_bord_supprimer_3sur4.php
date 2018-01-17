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
                  <div class="etape"><span>Selectionner le type de capteur</span></div>
    						<div class="dropdown-content">
      							<form method="post" action="../controleurs/controleur_suppression_capteur.php">
        							<label for="capteur" >Type : </label>
          							<select name="capteur">
                          <?php
                          //Connexion BDD
                          include('../modele/modele_connexion_bdd.php');

                          //On récupère dans la base de donné tous les capteurs qui appartiennent à la personne connectée dans la pièce selectionnée à l'étape précedente
                          $reponse = $bdd->prepare('SELECT id_capteur_actionneur FROM possession_capteur_actionneur WHERE nom_piece= ? AND code = ?');
                          $reponse ->execute(array($_SESSION['piece'], $_SESSION['code']));

                          //Comme on a récupèré des id de capteur il faut récupèrer leurs nom
                          while ($donnees = $reponse->fetch())
                          {
                            //On les affiches sous forme de formulaire
                            $rep = $bdd->prepare('SELECT type, statut FROM capteur_actionneur WHERE id = ?');
                            $rep ->execute(array($donnees['id_capteur_actionneur']));
                            $don = $rep->fetch();
                            if($don['statut']=="capteur")
                            {
                              echo ' <option value = ' . $don['type'] . '>' . $don['type'] . '</option>';
                              $rep ->closeCursor();
                            }
                          }
                          $reponse -> closeCursor();
                           ?>
          							</select>
        							<input type="submit" value="Suivant"/>
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
