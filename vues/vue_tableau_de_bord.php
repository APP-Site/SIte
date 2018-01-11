<?php $titre = "Tableau de bord"; ?>

<?php ob_start(); ?>

  <?php include("hpage.php"); ?>
  <?php include("navigation_client.php"); ?>

  <div class="corps">
    <?php include("notification.php"); ?>

    <section class="corps_page">
      <article class="un">
        <div class="dropdown">
          <span>Ajouter/Supprimer/Modifier</span>
          <div class="dropdown-content">
            <a href='vue_tableau_de_bord_ajouter_2sur4.php?titre=Tableau de bord'>Ajouter un capteur</a><br>
            <a href='vue_tableau_de_bord_supprimer_2sur4.php?titre=Tableau de bord'>Supprimer un capteur</a><br>
            <a href='vue_tableau_de_bord_modifier.php'>Modifier un capteur</a>
          </div>
        </div>
      </article>

      <?php while ($piece = $pieces->fetch())
      { ?>
        <article class="onglet">
          <div>
            <header><?php echo $piece['nom']; ?></header>
            <ul>
              <?php $capteurs_actionneurs = select_capteur_actionneur($code);
              while ($objet = $capteurs_actionneurs->fetch())
              {
                $data = htmlspecialchars($piece['id']);
                $data2=htmlspecialchars($objet['id']);
                if ($data == $objet['id_possession_piece'])
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

    <?php include("ppage.php"); ?>

<?php $content = ob_get_clean(); ?>
<?php require('vues/base.php'); ?>
