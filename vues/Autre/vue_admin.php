<!DOCTYPE html>
<html>
    <head>
            <meta charset="UTF-8"/>
            <link rel="stylesheet" href="style.css"/>
           <title>Techn'O'Logis Administrateur</title>
     </head>
     <header class="header">
       <?php include("hpage.php"); ?>
    </header>
    <body>
      <section class="recherche">
  			<form method="post" action="../controleurs/controleur_recherche_client_admin.php">
  				<label for="search">Recherche client : </label>
          <input type="search" name="search" id="search" placeholder="Inserer code client" size="70">
  				<input type="submit" value="Rechercher">
        </br>
  			</form>
        <form method="post" action="../controleurs/controleur_ajouter_capteur_admin.php">
          <label for="ajouter">Ajouter un nouveau capteur à la liste des capteurs déjà existantes : </label>
          <input type="text" name="ajouter" id="ajouter" placeholder="Ex : température" size="70">
          <input type="submit" value="Ajouter">
        </form>



        <article id="info">
              <?php include("../modele/modele_admin.php"); ?>
              <h3>Information client</h3>
                <ul>
                  <li>Nom: <?php echo $client['nom'];?> <?php echo $client['prenom'];?></li>
                  <li>Adresse: <?php echo $client['adresse'];?> <?php echo $client['code_postal']?> <?php echo $client['ville']?></li>
                  <li>Telephone: <?php echo $client['telephone_portable'];?></li>
                  <li>E-mail: <?php echo $client['email'];?></li>
                </ul>
        </article>
    </section>









    <footer class="footer">
      <?php include("ppage.php"); ?>
    </footer>

</body>
