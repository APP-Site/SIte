<?php
include('modele_connexion_bdd.php');

//On récupère de la BDD tous les noms de pièces appartenant à l'utilisateur
$reponse = $bdd->query('SELECT nom_piece FROM possession_piece WHERE code = "'.$_SESSION['code'].'"');


while($donnees = $reponse->fetch())
{
  //On test si la varriable entrée par l'utilisateur correspond bien à une de ses pieces dans la BDD
  if ($_SESSION['piece']==$donnees['nom_piece'])
  {
    $verification = true;
    break;
  }
  else
  {
    $verification = false;
  }
}

//Si la varriable correspond à un nom de pièce dans la base de donnée on continue à executer le code sinon on renvoie vers une page d'erreure
if($verification == false)
{
  header('Location: ../vues/vue_erreur.php');
  exit();
}


 ?>
