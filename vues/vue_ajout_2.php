<?php $titre = "Tableau de bord"; ?>

<?php ob_start(); ?>

  <?php include("pages_base/hpage.php"); ?>
  <?php include("pages_base/navigation_client.php"); ?>

  <div class="corps">
    <?php include("pages_base/notification.php"); ?>

    <section class="corps_page">
      <article class="trois">
        <div class="dropdown">
          <div class="etape"><span>Choisissez une pièce où l'installer</span></div>
          <div class="dropdown-content">
            <form method="post" action="index.php?action=ajout_piece">
              <label for="piece">Pièce : </label>
              <select name="piece" id="piece">
                <?php while ($piece = $pieces_ajout->fetch())
                {
                  echo ' <option value = ' . $piece['nom'] . '>' . $piece['nom'] . '</option>';
                }
                $pieces_ajout -> closeCursor();
                ?>
              </select>
              <input type="submit" value="Suivant" name="redirection"/>
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
