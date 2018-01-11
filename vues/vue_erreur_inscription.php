<?php $titre = "ERREUR" ; ?>


<?php ob_start(); ?>

  <p> Une erreure c'est produite. Veuillez <a href="index.php?action=inscription" id="verifier">vérifier</a> votre email et votre code d'accès donné à l'inscription. </p>

<?php $content = ob_get_clean(); ?>
<?php require ('vues/pages_base/base.php'); ?>
