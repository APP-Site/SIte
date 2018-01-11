<?php $titre = "Profil" ?>

<?php ob_start(); ?>

  <?php include("hpage.php"); ?>
  <?php include("navigation_client.php"); ?>

  <div class="corps">
    <?php include("notification.php"); ?>
    <ul id="profil">
      <li>Nom : <?php echo $_SESSION['nom']?></li>
      <li>Prenom : <?php echo $_SESSION['prenom']?></li>
      <li>Adresse : <?php echo $_SESSION['adresse']?> <?php echo $_SESSION['code_postal']?> <?php echo $_SESSION['ville']?></li>
      <li>Telephone : <?php echo $_SESSION['telephone_portable']?></li>
      <li>E-mail : <?php echo $_SESSION['email']?></li>
      <li>Code Client : <?php echo $_SESSION['code']?></li>
    </ul>

  </div>
  <?php include("ppage.php"); ?>

<?php $content = ob_get_clean(); ?>
<?php require('vues/base.php'); ?>
