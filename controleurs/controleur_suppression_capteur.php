<?php
session_start()
?>

<?php
//Test des varriable et redirection vers les differentes étapes d'ajout de capteur en fonction des varriables nulles ou non

//Est ce que l'ont est à l'étape 2
if (isset($_POST['capteur']) && empty($_POST['piece']))
{
  $_SESSION['capteur'] = $_POST['capteur'];
  header('Location: ../vues/vue_tableau_de_bord_ajouter_3sur4.php');
  exit();
}

//Est ce qu'on est à l'étape 3
elseif (isset($_POST['piece']) && empty($_POST['finalisation']))
{
  $_SESSION['piece'] = $_POST['piece'];
  header('Location: ../vues/vue_tableau_de_bord_valider.php');
  exit();
}

//Si les condition ne sont pas verifés nous sommes à l'étape 4
$_SESSION['finalisation'] = $_POST['finalisation'];
?>
