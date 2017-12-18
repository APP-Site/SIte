<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="style.css"/>
        <title>Techn'O'Logis-forum-topic</title>
    </head>

    <body>

        <?php include("hpage.php"); ?>
		<?php include("navigation_client.php"); ?>

        <div class="corps">
        	<?php include("notification.php"); ?>

        	<section class="corps_page">
        		<article class= "topicaffiche">
        			<p><a href="vue_page_forum.php?titre=Forum">Retour au forum</a></p>
              		<?php
                    // Connexion à la base de données
                    include('../modele/modele_connexion_bdd.php');
                    $id=$_GET['topic'];
					$req = $bdd->query('SELECT * FROM sujet_forum WHERE id_sujet_forum="'.$id.'"');
					$donnees = $req->fetch();
                	?>
                	<h2><?php echo $donnees['titre_sujet_forum']?></h2>
                	<?php echo $donnees['contenu_sujet_forum']?>
                </article>
                <?php
                $req->closeCursor(); // Important : on libère le curseur pour la prochaine requête 
                ?>
                
                <article>
                	<?php      
                    // Récupération des commentaires
                    $liste = $bdd->query('SELECT utilisateur.prenom, utilisateur.nom, contenu_commentaire, date_commentaire FROM commentaire_sujet_forum, utilisateur, sujet_forum WHERE commentaire_sujet_forum.id_topic = sujet_forum.id_sujet_forum AND commentaire_sujet_forum.code = utilisateur.code');

                    while ($com = $liste->fetch())
                    {
                    ?>
                		<div class="liste_commentaire">
                		<p><strong><?php echo $com['prenom']; ?> <?php echo $com['nom']; ?></strong> le <?php echo $com['date_commentaire']; ?></p>
                		<p><?php echo nl2br(htmlspecialchars($com['contenu_commentaire'])); ?></p></div>
                		<?php } // Fin de la boucle des commentaires
                        $req->closeCursor();
                        ?>
              	</article>

                <article>
                	<form class="creationtopic" action="../modele/modele_commentaires_post.php?topic=<?php echo $id ?>" method="post">
                        <p class="ajouter_commentaire"><label for="contenu_commentaire">Ajouter un commentaire</label> :  <textarea name="contenu_commentaire" id="contenu_commentaire" rows="7" cols="85"></textarea></p>
                        <input type="submit" value="Envoyer" />
                	</form>
                </article>

        	</section>
        </div>

        <?php include('ppage.php');?>
    </body>
</html>
