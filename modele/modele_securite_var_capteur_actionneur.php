<?php
include('modele_connexion_bdd.php');

//On récupère tous les noms des capteurs et des actionneures dans la BDD
$reponse = $bdd->query('SELECT type FROM capteur_actionneur');


while($donnees = $reponse->fetch())
{

  //On test s'il s'agit d'un test pour un capteur ou pour un actionneur
  if(isset($_SESSION['capteur']))
  {
    //Si c'est un capteur on test si la varriable capteur entrée par l'utilisateur correspond à un capteur dans la BDD
    if ($_SESSION['capteur']==$donnees['type'])
    {
      $verification = true;
      break ;
    }
    else
    {
      $verification = false;
    }
  }
  //Si c'est un actionneur on test si la varriable actionneur entrée par l'utilisateur correspond à un actionneur dans la BDD
  elseif (isset($_SESSION['actionneur']))
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

}

//Si la varrable concodre avec la base de donnée on continue l'execution du code sinon on renvoie à une page d'erreur
if($verification == false)
{
  header('Location: ../vues/vue_erreur.php');
  exit();
}


 ?>
