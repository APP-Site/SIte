<?php
session_start()
?>

<?php
//Test des varriable et redirection vers les differentes étapes de suppression d'actionneur en fonction des varriables nulles ou non

//Est ce que l'ont est à l'étape 2
if (isset($_POST['piece']) && empty($_POST['actionneur']))
{
  $_SESSION['piece'] = $_POST['piece'];
  //On teste la validitée de la varriable récupérée
  include('../modele/modele_securite_var_piece.php');
  header('Location: ../vues/vue_tableau_de_bord_supprimer_actionneur_3sur4.php?titre=Tableau de bord');
  exit();
}

//Est ce qu'on est à l'étape 3
elseif (isset($_POST['actionneur']) && empty($_POST['finalisation']))
{
  $_SESSION['actionneur'] = $_POST['actionneur'];
  //On test la validitée de la varriable récupérée
  include('../modele/modele_securite_var_actionneur.php');
  header('Location: ../vues/vue_tableau_de_bord_valider_suppression_actionneur.php?titre=Tableau de bord');
  exit();
}

//Si les condition ne sont pas verifés nous sommes à l'étape 4
$_SESSION['finalisation'] = $_POST['finalisation'];


//Connexion BDD
include('../modele/modele_connexion_bdd.php');
//Recuperation de l'id du type d'actionneur
include('../modele/modele_recuperer_id_type_actionneur.php');
//Recuperation de l'id de la ligne a supprimer dans possession_capteur_actionneur
include('../modele/modele_recuperer_id_possession_actionneur.php');

echo $id_suppression;
//Test sur la quel bouton à appuyé l'utilisateur soi valider soit annuler soir prrécédent
if($_SESSION['finalisation']=='Valider')
{
  $req = $bdd->prepare('DELETE  FROM possession_capteur_actionneur WHERE id=?');
  $req->execute(array($id_suppression));
  header('Location: ../vues/vue_tableau_de_bord.php?titre=Tableau de bord');
}
elseif($_SESSION['finalisation']=='Annuler')
{
  unset($_SESSION['capteur'], $_SESSION['piece']);
  header('Location: ../vues/vue_tableau_de_bord.php?titre=Tableau de bord');
}
elseif($_SESSION['finalisation']=='Précédent')
{
  unset($_SESSION['capteur']);
  header('Location: ../vues/vue_tableau_de_bord_supprimer_actionneur_3sur4.php?titre=Tableau de bord');
}

?>
