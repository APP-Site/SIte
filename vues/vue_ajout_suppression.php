<?php $titre = "Tableau de bord"; ?>

<?php ob_start(); ?>

  <?php include("pages_base/hpage.php"); ?>
  <?php include("pages_base/navigation_client.php"); ?>

  <div class="corps">
    <?php include("pages_base/notification.php"); ?>

    <section class="corps_page">
      <article class="un">
        <div class="dropdown">
          <div class="etape"><span>Ajouter/Supprimer</span></div>
          <div class="dropdown-content">
            <a href='index.php?action=ajout_1'>Ajouter un capteur</a><br>
            <a href='index.php?action=suppression_1'>Supprimer un capteur</a><br>
          </div>
        </div>
      </article>

      <?php include('vue_tableau_de_bord.php');?>

      </section>
    </div>

    <?php include("pages_base/ppage.php"); ?>

<?php $content = ob_get_clean(); ?>
<?php require('pages_base/base.php'); ?>
