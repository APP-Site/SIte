<?php $titre = "Informations"; ?>

<?php ob_start(); ?>

  <?php include("pages_base/hpage.php"); ?>
  <?php include("pages_base/navigation_client.php"); ?>

  <div class="corps">
    <?php include("pages_base/notification.php"); ?>
    
    <div id="info_piece">
      Liste des pieces :
      <ul>
        <?php while ($piece = $pieces -> fetch()) {?> <li><?php echo $piece['nom']; ?></li> <?php } ?>
      </ul>
      <a>Modifier</a>
    </div>

  </div>
  <?php include("pages_base/ppage.php"); ?>

<?php $content = ob_get_clean(); ?>
<?php require('vues/pages_base/base.php'); ?>
