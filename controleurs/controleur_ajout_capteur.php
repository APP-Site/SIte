<?php
session_start()
?>

<?php
//Test des varriable et redirection vers les differentes étapes d'ajout de capteur en fonction des varriables nulles ou non

  //Est ce que l'ont est à l'étape 2
  if (isset($_POST['capteur']) && empty($_POST['piece']))
  {
    $_SESSION['capteur'] = $_POST['capteur'];
    header('Location: ../vues/vue_tableau_de_bord_ajouter_3sur4.php?titre=Tableau de bord');
    exit();
  }

  //Est ce qu'on est à l'étape 3
  elseif (isset($_POST['piece']) && empty($_POST['finalisation']))
  {
    $_SESSION['piece'] = $_POST['piece'];
    header('Location: ../vues/vue_tableau_de_bord_valider_ajout.php?titre=Tableau de bord');
    exit();
  }

//Si les condition ne sont pas verifés nous sommes à l'étape 4
$_SESSION['finalisation'] = $_POST['finalisation'];

//Connexion BDD
include('../modele/modele_connexion_bdd.php');
//Recuperation de l'id du type de capteur
include('../modele/modele_recuperer_id_type_capteur.php');


//Test sur la quel bouton à appuyé l'utilisateur soi valider soit annuler soir prrécédent
if($_SESSION['finalisation']=='Valider')
{
  $req = $bdd->prepare('INSERT INTO possession_capteur_actionneur(id_capteur_actionneur, etat, fonctionnement, nom_piece, code) VALUES (:id_capteur_actionneur, 1, 1, :nom_piece, :code)');
  $req->execute(array('id_capteur_actionneur'=>$_SESSION['capteur'], 'nom_piece'=>$_SESSION['piece'], 'code'=>$_SESSION['code']));
  header('Location: ../vues/vue_tableau_de_bord.php?titre=Tableau de bord');
}
elseif($_SESSION['finalisation']=='Annuler')
{
  unset($_SESSION['capteur'], $_SESSION['piece']);
  header('Location: ../vues/vue_tableau_de_bord.php?titre=Tableau de bord');
}
elseif($_SESSION['finalisation']=='Précédent')
{
  unset($_SESSION['piece']);
  header('Location: ../vues/vue_tableau_de_bord_ajouter_3sur4.php?titre=Tableau de bord');
}
?>
