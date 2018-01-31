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
				<article class="quatre">
            		<div class="dropdown">
  						<div class="etape"><span>Valiation de l'ajout</span></div>
  						<div class="dropdown-content">
                <form method="post" action="../controleurs/controleur_suppression_capteur.php">
        						<label for="finalisation">Finaliser : </label>
                    <input type="submit" value="Valider" name="finalisation" />
                    <input type="submit" value="Annuler" name="finalisation"/>
                    <input type="submit" value="Précédent" name="finalisation"/>
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
                       			      $valeur = $donnee->fetch();


                                  //On récupère le statut pour savoir si c'est un capteur ou un actionneur
                                  $rep = $bdd->query('SELECT statut FROM capteur_actionneur WHERE id = "'.$objet['id'].'" ');
                                  $don = $rep->fetch();

                                  //Si c'est un capteur on affiche sa donnée son image et son unitée
                                  if($don['statut']== "capteur")
                                  {
                                    ?>
                                    <li><img src="<?php echo $objet['image'];?>"><br><br>
                                      <div class="valeur_capteur">
                                        <strong><?php echo $valeur['valeur'], $objet['id']?></strong>
                                        <p><?php echo $objet['unite'];?></p>
                                      </div>
                                    </li>
                                    <?php
                                  }
                                  //Si c'est un actionneur on affiche on off pour allumé et étindre en montrant si actuellement il est on ou off
                                  else
                                  {
                                    //On va donc tester si le capteur est ON ou OFF
                                    $rasta = $bdd->query('SELECT etat, id FROM possession_capteur_actionneur WHERE nom_piece="'.$objet['nom_piece'].'" AND code="'.$code.'" AND id_capteur_actionneur="'.$objet['id'].'"');
                                    $der = $rasta->fetch();
                                    //Si l'etat de l'actionneur est 0 il est OFF alors on affiche un CSS qui va
                                    if($der['etat']==0)
                                    {
                                      $id = $der['id'];
                                      ?>
                                      <li><img src="<?php echo $objet['image'];?>"><br><br>
                                          <div class="valeur_actionneur_off">
                                            <strong><?php echo "OFF"?></strong><br><br>
                                            <form method="post" action="../controleurs/controleur_actionneur_on_off.php">
                                              <input type="submit" value="Activer" name="off"/>
                                              <?php echo  '<input type="hidden" value="'.$id.'" name="id_actionneur"/>'?>
                                            </form>
                                          </div>
                                      </li>
                                      <?php
                                    }
                                    //Sinon il est ON et on affiche le CSS qui va
                                    else
                                    {
                                      $id = $der['id'];
                                      ?>
                                      <li><img src="<?php echo $objet['image'];?>"><br><br>

                                        <div class="valeur_actionneur_on">
                                          <strong><?php echo "ON"?></strong><br><br>
                                          <form method="post" action="../controleurs/controleur_actionneur_on_off.php">
                                            <input type="submit" value="Désactiver" name="on"/>
                                            <?php echo  '<input type="hidden" value="'.$id.'" name="id_actionneur"/>'?>
                                          </form>
                                        </div>
                                      </li>
                                      <?php
                                    }
                                  }
                                  ?>
                            <?php }}?>
                       		</ul>
                    	</div>
                	</article>
                <?php }?>

        	</section>
        </div>

        <?php include("ppage.php"); ?>

    </body>
