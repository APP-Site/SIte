<!DOCTYPE html>
<html>
    <head>
            <meta charset="UTF-8"/>
            <link rel="stylesheet" href="vue_admin.css"/>
           <title>Techn'O'Logis Administrateur</title>
     </head>
     <header class="header">
       <?php include("hpage.php"); ?>
    </header>
    <body>
      <div class="recherche">
        <p>Rechercher un client</p>
  			<form method="post" action="../controleurs/controleur_recherche_client_admin.php">
  				<label for="search"></label>
          <input type="search" name="search" id="search" placeholder="Inserer code client" size="70"></br>
          </br>
  				<input type="submit" value="Rechercher">
        </br>
  			</form>
      </div>
        <div class="ajouer">
          <p>Ajouter un capteur au catalogue </p>
          <form method="post" action="../controleurs/controleur_ajouter_capteur_admin.php">
              <label for="statut">Statut : </label>
              <select><option>Statut </select></br>
              <label for="type">Type : </label>
              <input type="text" name="type" id="type" placeholder="Ex : température" size="70"></br>
              <label for="unite">Unité : </label>
              <input type="text" name="unite" id="unite" placeholder="Ex : °C" size="70"></br>
              <label for="ref">Référence : </label>
              <input type="text" name="ref" id="ref" placeholder="Ex : FRT74" size="70"></br>
              <label for="image">Image : </label>
              <input type="file" name="image" id="image" ></br>
              </br>
              <input type="submit" value="Ajouter">
          </form>
        </div>




    <footer class="footer">
      <?php include("ppage.php"); ?>
    </footer>

</body>
