<?php $titre = "Tableau de bord"; ?>

<?php ob_start(); ?>

  <?php include("pages_base/hpage.php"); ?>
  <?php include("pages_base/navigation_client.php"); ?>

  <div class="corps">
    <?php include("pages_base/notification.php"); ?>

    <section class="corps_page">
      <article class="quatre">
        <div class="dropdown">
          <div class="etape"><span>Valiation de l'ajout</span></div>
          <div class="dropdown-content">
            <ul>
              <li><a href="index.php?action=valider">Valider</a></li>
              <li><a href="index.php?action=annuler">Annuler</a></li>
            </ul>
          </div>
        </div>
      </article>

      <?php include('vues/vue_tableau_de_bord.php'); ?>

    </section>
  </div>

  <?php include("pages_base/ppage.php"); ?>

<?php $content = ob_get_clean(); ?>
<?php require('pages_base/base.php'); ?>
