<?php $titre = "Informations"; ?>

<?php ob_start(); ?>

  <?php include("hpage.php"); ?>
  <?php include("navigation_client.php"); ?>

  <div class="corps">
    <?php include("notification.php"); ?>
    <div id="info_piece">
      Liste des pieces :
      <ul>
        <?php while ($piece = $pieces -> fetch()) {?> <li><?php echo $piece['nom']; ?></li> <?php } ?>
      </ul>
      <a>Modifier</a>
    </div>

  </div>
  <?php include("ppage.php"); ?>

<?php $content = ob_get_clean(); ?>
<?php require('vues/base.php'); ?>
