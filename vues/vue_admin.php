<?php $titre = "Page admin"; ?>

<?php ob_start(); ?>

  <?php include("pages_base/hpage.php"); ?>

  <div class="corps">
    <?php include("pages_base/notification.php"); ?>

    <section>
      <form method="post" action="index.php?action=admin_recherche_client">
        <label for="search_admin">Recherche client : </label>
        <input type="search" name="search_admin" id="search_admin" placeholder="Inserer code client" size="70">
        <input type="submit" value="Rechercher"></br>
      </form>

      <article>
        <h3>Ajouter un nouveau capteur à la liste des capteurs déjà existantes : </h3>
        <form method="post" action="index.php?action=admin_ajout_capteur">
          <label for="type">Type du capteur : </label><input type="text" name="type" id="type" placeholder="Ex : température" size="70"><br>
          <label for="unite">Donner l'unité de la valeur du capteur : </label><input type="text" name="unite" id="unite"><br>
          <label for="image">Donner le lien de l'image : </label><input type="text" name="image" id="image"><br>
          <label for="ref">Donner la référence du capteur : </label><input type="text" name="ref" id="ref"><br>
          <input type="submit" value="Ajouter">
        </form>
      </article>

      <?php if (!empty($code)) { ?>
        <article id="info">
          <h3>Information client</h3>
          <ul>
            <li>Nom: <?php echo $client['nom'];?> <?php echo $client['prenom'];?></li>
            <li>Adresse: <?php echo $client['adresse'];?> <?php echo $client['code_postal']?> <?php echo $client['ville']?></li>
            <li>Telephone: <?php echo $client['telephone_portable'];?></li>
            <li>E-mail: <?php echo $client['email'];?></li>
          </ul>
          <a href="index.php?action=supprimer_client&code=<?= $client['code'] ?>">Supprimer le client</a>
        </article>
    <?php } ?>
    </section>
  </div>

    <?php include("pages_base/ppage.php"); ?>

  <?php $content = ob_get_clean(); ?>
  <?php require('pages_base/base.php'); ?>
