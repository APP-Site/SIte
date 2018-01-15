<?php
//Connexion BDD
include('modele/modele_connexion_bdd.php');

//On récupère dans la table type l'id du capteur et son nom
$reponse = $bdd->query('SELECT id, nom FROM type');

//Test si le nom correspond à celui selectionné par l'utilisateur
while ($donnees = $reponse->fetch())
{
  echo $donnees['nom'], $donnees['id'];
}
?>
