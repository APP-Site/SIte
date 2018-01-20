<?php $titre = "Profil" ?> <!-- affiche les informations de l'utilisateur -->

<?php ob_start(); ?>

  <?php include("pages_base/hpage.php"); ?>
  <?php include("pages_base/navigation_client.php"); ?>

  <div class="corps">
    <?php include("pages_base/notification.php"); ?>
    <ul id="profil">
      <li class="nom_profil">Nom : <?php echo $_SESSION['nom']?> <a href="index.php?action=modifier_nom" style="padding-right:60px; padding-left: 60px;">(Modifier le nom)</a>
        <?php if ($_GET['action'] == "modifier_nom") { ?>
          <form action="index.php?action=modification_nom&type=nom" method="post">
            <label for="modif">Remplacer le nom : </label>
            <input type="text" id="modif" name="modif">
            <input type="submit" value="Modifier">
          </form>
        <?php } ?></li>
      <li class="prenom_profil">Prenom : <?php echo $_SESSION['prenom']?> <a href="index.php?action=modifier_prenom" style="padding-right:60px; padding-left: 60px;">(Modifier le prénom)</a>
        <?php if ($_GET['action'] == "modifier_prenom") { ?>
          <form action="index.php?action=modification_prenom&type=prenom" method="post">
            <label for="modif">Remplacer le prenom : </label>
            <input type="text" id="modif" name="modif">
            <input type="submit" value="Modifier">
          </form>
        <?php } ?></li>
      <li>Adresse : <?php echo $_SESSION['adresse']?> <?php echo $_SESSION['code_postal']?> <?php echo $_SESSION['ville']?></li>
      <li class="telephone_profil">Telephone : <?php echo $_SESSION['telephone_portable']?> <a href="index.php?action=modifier_telephone" style="padding-right:60px; padding-left: 60px;">(Modifier le numéro de téléphone)</a>
        <?php if ($_GET['action'] == "modifier_telephone") { ?>
          <form action="index.php?action=modification_telephone&type=telephone_portable" method="post">
            <label for="modif">Remplacer le numéro : </label>
            <input type="tel" id="modif" name="modif">
            <input type="submit" value="Modifier">
          </form>
        <?php } ?></li>
      <li class="email_profil">E-mail : <?php echo $_SESSION['email']?> <a href="index.php?action=modifier_email" style="padding-right:60px; padding-left: 60px;">(Modifier l'email)</a>
        <?php if ($_GET['action'] == "modifier_email") { ?>
          <form action="index.php?action=modification_email&type=email" method="post">
            <label for="modif">Remplacer l'email : </label>
            <input type="email" id="modif" name="modif">
            <input type="submit" value="Modifier">
          </form>
        <?php } ?></li>
      <li>Code Client : <?php echo $_SESSION['code']?></li>
    </ul>

  </div>
  <?php include("pages_base/ppage.php"); ?>

<?php $content = ob_get_clean(); ?>
<?php require('vues/pages_base/base.php'); ?>
