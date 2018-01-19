<?php $titre = "Editeur de Maison"; ?>

<?php ob_start(); ?>

  <?php include("pages_base/hpage.php"); ?>

  <div class="corps">
    <?php include("pages_base/notification.php"); ?>

    <section>
      <article class = "intro_editeur">
        <h2>Bonjour <?php echo $_SESSION['prenom'];?> <?php echo $_SESSION['nom']?></h2> <!--récupère les information du client -->
        <p class = "bienvenue">
          Bienvenue dans l'éditeur de votre maison, 1ère étape la conception de votre espace. Vous aurez a répertorier les différentes pièces de votre logis en étant le plus exact possible.Vous n'aurez plus qu'ensuite à choisir parmis notre large séléction de capteurs pour les placer dans vos pièces!<br/>
          Vous reviendrez sur cette page jusqu'à avoir rentrer toutes vois pièces.
        </p>
      </article>

      <hr class= "ligne"> <!--on va créer un formulaire pour que le client choisissent le nom de ses pièces-->
      <article class="form_editeur">
        <form class="nom_piece" action="index.php?action=poste_piece" method="post">
          <label class = "ajout_piece" for="id_piece"> Nom de la pièce à ajouter :</label><br>
          <input class="bloc" type="text" name="id_piece" id="id_piece" placeholder="Exemple : Salon"/><br>
          <button class="validity" type="submit">Valider</button>
        </form>
      </article>

      <hr class ="ligne1"><p class="valider_edit">Si vous avez finis la conception de votre espace veuillez vous diriger vers notre site en <a href="index.php?action=tableau_bord">CLIQAUNT ICI</a>.</p>

    </section>

  </div>

  <?php include("pages_base/ppage.php"); ?>

<?php $content = ob_get_clean(); ?>
<?php require('pages_base/base.php'); ?>
