<?php $titre = "Tableau de bord"; ?>

<?php ob_start(); ?>

  <?php include("pages_base/hpage.php"); ?>
  <?php include("pages_base/navigation_client.php"); ?>

  <div class="corps">
    <?php include("pages_base/notification.php"); ?>

    <section class="corps_page">
      <?php include ('vues/vue_ajouter_supprimer.php'); ?>

      <?php while ($piece = $pieces->fetch()) // affiche les pièces de l'utilisateurs
      { ?>
        <article class="onglet">
          <div>
            <header><?php echo $piece['nom']; ?></header>
            <ul>
              <?php $capteurs_actionneurs = select_capteur_actionneur($code); // sélectionne les capteurs actionneurs de l'utilisateur
              while ($objet = $capteurs_actionneurs->fetch())
              {
                $data = htmlspecialchars($piece['id']);
                $data2=htmlspecialchars($objet['id']);
                if ($data == $objet['id_possession_piece']) // relie les capteurs_actionneurs à la pièce où il est
                {
                  $valeur = select_donnee($data2); ?>
                  <li><img src="<?php echo $objet['image'];?>"><br><?php echo $valeur['valeur']?> <?php echo $objet['unite'];?></li>
                <?php }}?>
              </ul>
            </div>
          </article>
        <?php }?>

      </section>
    </div>

    <?php include("pages_base/ppage.php"); ?>

<?php $content = ob_get_clean(); ?>
<?php require('vues/pages_base/base.php'); ?>
