<?php
include('modele_connexion_bdd.php');

//On récupère tous les noms des capteurs et des actionneures dans la BDD
$reponse = $bdd->query('SELECT type FROM capteur_actionneur');


while($donnees = $reponse->fetch())
{
    if ($_SESSION['actionneur']==$donnees['type'])
    {
      $verification = true;
      break ;
    }
    else
    {
      $verification = false;
    }
}

//Si la varrable concodre avec la base de donnée on continue l'execution du code sinon on renvoie à une page d'erreur
if($verification == false)
{
  header('Location: ../vues/vue_erreur.php');
  exit();
}


 ?>
