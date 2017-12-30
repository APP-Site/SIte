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

	<form method="post" action="../Controleur/controleur_editeur.php">
	<div class = "manychoices">
   	<article>
       <input type="checkbox" name="Salon[]" id="salon" />
       <label for="salon">Salon</label>
       <select class="salon" 	name="salon" id="salon">
       	   <option value="0">0</option>
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option></select><br/>

       <input type="checkbox" name="cuisine[]" id="cuisine" />
       <label for="cuisine">Cuisine</label>
       <select class="cuisine" 	name="cuisine" id="cuisine">
       	   <option value="0">0</option>
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option></select><br/>

       <input type="checkbox" name="toilettes[]" id="toilettes" />
       <label for="toilettes">Toilettes</label>
       <select class="toilettes" 	name="toilettes" id="toilettes">
       	   <option value="0">0</option>
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
       </select><br/>
    </article>

    <article>
       <input type="checkbox" name="chambre[]" id="chambre" />
       <label for="chambre">Chambre</label>
       <select class="chambre" 	name="chambre" id="chambre">
       	   <option value="0">0</option>
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="5">5</option>
       </select><br>

      <input type="checkbox" name="bureau[]" id="bureau" />
      <label for="bureau">Bureau</label>
         <select class="bureau" 	name="bureau" id="bureau">
       	   <option value="0">0</option>
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
       </select><br>

       <input type="checkbox" name="salle_de_bain[]" id="salle_de_bain"/>
       <label for="salle_de_bain">Salle de bain </label>
       <select class="salle_de_bain" 	name="salle_de_bain" id="bureau">
       	   <option value="0">0</option>
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
       </select><br>
     </article>


    <button class="validity1" type="submit">Valider</button>
      <form method="post" action="traitement.php">

</form>
  	</div>
	</form>
	<hr class = "ligne2">



     </div>

        <?php include("ppage.php"); ?>

    </body>

    hhh 
