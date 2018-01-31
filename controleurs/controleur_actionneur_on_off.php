<?php
session_start()
?>


<?php
include('../modele/modele_connexion_bdd.php');
//Le but de ce controleur est de changer dans la bdd la valeur de l'etat d'un actionneur en foncion du choix de l'utilisateur

//Il y a deux cas à différancier

echo $_POST['id_actionneur'];


//1er cas la personne veut allumer un actionneur
if(isset($_POST['off']))
{
  $reponse = $bdd->query('UPDATE possession_capteur_actionneur SET etat = 1 WHERE id="'.$_POST['id_actionneur'].'"');
  header('Location: ../vues/vue_tableau_de_bord.php?titre=Tableau de bord');
  exit();
}

//2eme cas la personne veut éteindre un id_actionneur
elseif(isset($_POST['on']))
{
  $reponse = $bdd->query('UPDATE possession_capteur_actionneur SET etat = 0 WHERE id="'.$_POST['id_actionneur'].'"');
  header('Location: ../vues/vue_tableau_de_bord.php?titre=Tableau de bord');
  exit();
}

 ?>
