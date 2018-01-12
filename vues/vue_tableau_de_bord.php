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
				<article class="un">
            		<div class="dropdown">
  						<div class="etape"><span>Ajouter/Supprimer/Modifier</span><div>
  						<div class="dropdown-content">
    						<a href='vue_tableau_de_bord_ajouter_2sur4.php?titre=Tableau de bord'>Ajouter un capteur</a><br>
    						<a href='vue_tableau_de_bord_supprimer_2sur4.php?titre=Tableau de bord'>Supprimer un capteur</a><br>
    						<a href='vue_tableau_de_bord_modifier.php'>Modifier un capteur</a>
  						</div>
					</div>
            	</article>

        	<?php
        	$code=htmlspecialchars($_SESSION['code']);
            $reponse = $bdd->query('SELECT piece.nom, possession_piece.id FROM possession_piece INNER JOIN piece ON possession_piece.id_piece=piece.id WHERE code = "'.$code.'"');

            while ($piece = $reponse->fetch())
            { ?>
                <article class="onglet">
                	<div>
            		  	<header><?php echo $piece['nom']; ?></header>
                   		<ul>
                   			<?php
                   			$data=htmlspecialchars($piece['id']);
                   			$resultat = $bdd->query('SELECT image, type.nom, possession_capteur_actionneur.id_possession_piece, possession_capteur_actionneur.id, unite FROM type, possession_capteur_actionneur, capteur_actionneur WHERE possession_capteur_actionneur.id_capteur_actionneur = capteur_actionneur.id AND capteur_actionneur.id_type = type.id AND code = "'.$code.'" ');
                   			while ($objet = $resultat->fetch())
                   			{
                   			  if ($data==$objet['id_possession_piece'])
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
