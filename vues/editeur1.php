<?php session_start()?>


<!DOCTYPE html>
<html>
    <head>
            <meta charset="UTF-8"/>
            <link rel="stylesheet" href="style.css"/>
           <title>Techn'O'Logis-Tableau de Bord</title>
     </head>

    <body class="body">


        <?php include("hpage.php"); ?>

        <div class ="corps_edit">

        <?php include("notification.php"); ?>
        <section class = "intro">
        <p class="bjr">
        Bonjour <?php echo $_SESSION['prenom'];?> <?php  echo $_SESSION['nom']?> !
        </p>
        <p class = "bienvenue">
        Bienvenue dans l'editeur de votre maison, 1er étape de conception de votre espace. Vous aurez a repertorier les differentes pieces de votre logis en etant le plus exact possible. Vous n'aurez plus qu'en suite a choisir parmis notre large selection de capteurs pour les placer dans vos pieces!
        </p><br>
      	<hr class= "ligne">

        <form class="nom_piece" action="../controleurs/controleur_editeur.php" method="post">
          <div>
            <label class = "ajout_piece" for="nom_piece"> Nom de la pièce à ajouter :</label><br>
            <input class="bloc" type="text" name="nom_piece" id="nom_piece" placeholder="Exemple : Salon"/><br>
            <button class="validity" type="submit">Valider</button>
          </div>

        </form>
