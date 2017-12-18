<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="style.css"/>
        <title>Techn'O'Logis-Forum</title>
    </head>

    <body>


        <?php include("hpage.php"); ?>
        <?php include("navigation_client.php"); ?>

        <div class="corps">
			<?php include("notification.php"); ?>
			

            <section class="forum">

                <article class="ongletForum">
                    <div class="sujet">
            	        <form class="creationtopic" action="../modele/forum_post.php" method="post">
                            <p class="contenu"><label for="titre_sujet_forum">Titre : </label><input type="text" name="titre_sujet_forum" id="titre_sujet_forum" size="91" /></p>
                            <p class="contenu"><label for="contenu_sujet_forum">Contenu : </label><textarea name="contenu_sujet_forum" id="contenu_sujet_forum" rows="4" cols="75"></textarea></p>
                            <input type="submit" value="Creer" class="creer"/>
                        </form>
						
						<div class="liste_sujet">
                        	<?php
                            // Connexion à la base de données

                            include('../modele/modele_connexion_bdd.php');

                            // On récupère les 5 derniers topics
                            include('../controleurs/controleur_afficher_topic.php');

                            ?>
                        </div>
                    </div>
            	</article>

            	<aside class="cote_D_page">
                	<div class="asideforum">
                    	<p class="infoforum1"> Nombre de connecté: 136</p>
                    	<div class="infoforum2">
                    		Mes sujets favoris : 
                    		<ul>
                        		<li>-Les meilleurs capteurs de présence</li>
                        		<li>-[HELP]Bug système general</li>
                        		<li>-Le modérateur du forum</li>
                    		</ul>
                    	</div>
                	</div>
            	</aside>
            </section>
        </div>

        <?php include("ppage.php");?>

    </body>
