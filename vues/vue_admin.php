<?php $titre = "Page admin"; ?>

<?php ob_start(); ?>

  <?php include("pages_base/hpage.php"); ?>

  <div class="corps">
    <?php include("pages_base/notification.php"); ?>

    <section class="admin">
      <article>
        <h3>Ajouter un nouveau capteur à la liste des capteurs déjà existante : </h3>
        <form method="post" action="index.php?action=admin_ajout_capteur">
          <label for="type">Type du capteur : </label><input type="text" name="type" id="type" placeholder="Ex : température" size="50"><br>
          <label for="unite">Donner l'unité de la valeur du capteur : </label><input type="text" name="unite" id="unite"><br>
          <label for="image">Donner le lien de l'image : </label><input type="text" name="image" id="image" size="40"><br>
          <label for="ref">Donner la référence du capteur : </label><input type="text" name="ref" id="ref"><br>
          <input type="submit" value="Ajouter">
        </form>
      </article>

      <article>
        <h3>Ajouter une actualité : </h3>
        <form method="post" action="index.php?action=admin_ajout_actualite">
          <label for="sujet_actu">Titre du sujet d'actualité : </label><input type="text" name="sujet_actu" id="sujet_actu" size="40"><br>
          <p class="contenu_actualite"><label for="contenu_actu">Contenu : </label><textarea name="contenu_actu" id="contenu_actu" rows="4" cols="65"></textarea></p>
          <input type="submit" value="Ajouter">
        </form>
      </article>
    </section>

    <section id="info_admin">
      <article class="barre_recherche_admin">
        <p>
          <form method="post" action="index.php?action=admin_recherche_client" class="search_client_admin">
            <label for="search_admin"><strong>Recherche client : </strong></label>
            <input type="search" name="search_admin" id="search_admin" placeholder="code client" size="20">
            <input type="submit" value="Rechercher"></br>
          </form>
        </p>

        <p>
          <form method="post" action="index.php?action=admin_recherche_capteur" class="search_capteur_admin">
            <label for="capt_admin"><strong>Rechercher un capteur : </strong></label>
            <input type="search" name="capt_admin" id="capt_admin" placeholder="référence du capteur" size="20">
            <input type="submit" value="Rechercher"></br>
          </form>
        </p>
      </article>

      <?php if (!empty($code)) { ?>
        <article>
          <h3>Information client</h3>
          <ul>
            <li><strong>Nom: </strong><?php echo $client['nom'];?> <?php echo $client['prenom'];?></li>
            <li><strong>Adresse: </strong><?php echo $client['adresse'];?> <?php echo $client['code_postal']?> <?php echo $client['ville']?></li>
            <li><strong>Telephone: </strong><?php echo $client['telephone_portable'];?></li>
            <li><strong>E-mail: </strong><?php echo $client['email'];?></li>
          </ul>
          <a href="index.php?action=supprimer_client&code=<?= $client['code'] ?>">Supprimer le client</a>
        </article>
      <?php } ?>

      <?php if (!empty($ref)) { ?>
        <article>
          <h3>Information sur le capteur</h3>
          <ul>
            <li><strong>Type : </strong><?php echo $capteur['type'];?> (<?php echo $capteur['unite'];?>)</li>
            <li><strong>Lien de l'image : </strong><?php echo $capteur['image'];?></li>
            <li><strong>Référence : </strong><?php echo $capteur['reference'];?></li>
          </ul>
          <a href="index.php?action=supprimer_capteur&ref=<?= $capteur['reference'] ?>">Supprimer le capteur</a>
        </article>
    <?php } ?>
    </section>
  </div>

    <?php include("pages_base/ppage.php"); ?>

  <?php $content = ob_get_clean(); ?>
  <?php require('pages_base/base.php'); ?>
