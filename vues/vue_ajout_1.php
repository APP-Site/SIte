<?php $titre = "Tableau de bord"; ?>

<?php ob_start(); ?>

  <?php include("pages_base/hpage.php"); ?>
  <?php include("pages_base/navigation_client.php"); ?>

  <div class="corps">
    <?php include("pages_base/notification.php"); ?>

    <section class="corps_page">
      <article class="deux">
        <div class="dropdown">
          <div class="etape"><span>Selectionner le type de capteur</span></div>
          <div class="dropdown-content">
            <form method="post" action="index.php?action=ajout_2">
              <label for="capteur" >Type : </label>
              <select name="capteur" id="capteur">
                <?php while ($type = $types->fetch())
                {
                  echo ' <option value = ' . $type['type'] . '>' . $type['type'] . '</option>';
                }
                $types -> closeCursor();
                ?>
              </select>
              <input type="submit" value="Suivant"/>
            </form>
          </div>
        </div>
      </article>

      <?php include('vues/vue_tableau_de_bord.php');?>

    </section>
  </div>

<?php include("pages_base/ppage.php"); ?>

<?php $content = ob_get_clean(); ?>
<?php require('pages_base/base.php'); ?>
