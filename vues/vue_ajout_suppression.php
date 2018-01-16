<?php $titre = "Tableau de bord"; ?>

<?php ob_start(); ?>

  <?php include("pages_base/hpage.php"); ?>
  <?php include("pages_base/navigation_client.php"); ?>

  <div class="corps">
    <?php include("pages_base/notification.php"); ?>

    <section class="corps_page">
      <article class="un">
        <div class="dropdown">
          <span>Ajouter/Supprimer</span>
          <div class="dropdown-content">
            <a href='vue_tableau_de_bord_ajouter_2sur4.php?titre=Tableau de bord'>Ajouter un capteur</a><br>
            <a href='vue_tableau_de_bord_supprimer_2sur4.php?titre=Tableau de bord'>Supprimer un capteur</a><br>
          </div>
        </div>
      </article>

      <?php include('vue_tableau_de_bord.php');?>

      </section>
    </div>

    <?php include("pages_base/ppage.php"); ?>

<?php $content = ob_get_clean(); ?>
<?php require('pages_base/base.php'); ?>
