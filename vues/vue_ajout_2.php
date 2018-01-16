<?php $titre = "Tableau de bord"; ?>

<?php ob_start(); ?>

  <?php include("pages_base/hpage.php"); ?>
  <?php include("pages_base/navigation_client.php"); ?>

  <div class="corps">
    <?php include("pages_base/notification.php"); ?>

        	<section class="corps_page">
				<article class="trois">
            		<div class="dropdown">
  						<div class="etape"><span>Choisissez une pièce où l'installer</span></div>
  						<div class="dropdown-content">
    					<form method="post" action="../controleurs/controleur_ajout_capteur.php">
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
      						<input type="submit" value="Suivant" name="redirection"/>
    					</form>
  						</div>
					</div>
            	</article>

        	<?php include('vues/vue_tableau_de_bord.php');?>

        	</section>
        </div>

        <?php include("pages_base/ppage.php"); ?>

        <?php $content = ob_get_clean(); ?>
        <?php require('pages_base/base.php'); ?>
