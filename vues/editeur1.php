<?php session_start()?>


<!DOCTYPE html>
<html>
    <head>
            <meta charset="UTF-8"/>
            <link rel="stylesheet" href="editeur.css"/>
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
        Bienvenue dans l'editeur de votre maison, 1er etape de conception de votre espace. Vous aurez a repertorier les differentes pieces de votre logis en etant le plus exact possible. Vous n'aurez plus qu'en suite a choisir parmis notre large selection de capteurs pour les placer dans vos pieces!
        </p><br>
      	<hr class= "ligne">

        <p class="logis">
        Type de logis :
        </p>
<form class = "check">
	<div class ="c1">
    <input type="radio" id="choix1"
     name="contact" value="Maison">
    <label for="choix1">Maison</label>
    </div>
    <div class="c2">
    <input type="radio" id="choix2"
     name="contact" value="Appartement">
    <label for="choix2">Appartement</label>
    </div>

    <div>
    <button class="validity" type="submit">Valider</button>
    </div>
</form>
	<hr class ="ligne1">
	<p class="pi�ces">
	Pieces a ajouter:
	</p>

	<form method="post" action="../controleurs/controleur_editeur.php">
    <p>
      <label for="nom_piece"> Rentrez le nom de la pièce : </label><br>
      <input type="text" id="nom_piece" name="nom_piece" size="30">
    </p>
    <p>
      <input type="submit" value="valider">
    </p>

  </form>
LAURA
