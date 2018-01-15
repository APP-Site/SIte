<?php
//On veut trouver pour un capteur seletionné quel est son id_type dans la table type pour ensuite savoir quoi mettre dans id_capteur_actionneur

//On récupère dans la table type l'id du capteur et son nom
$reponse = $bdd->query('SELECT id, type FROM capteur_actionneur');

//Test quel id correspond à celui selectionné par l'utilisateur
while($donnees = $reponse->fetch())
{
  if($donnees['type']==$_SESSION['capteur'])
  {
    $_SESSION['capteur']=$donnees['id'];
  }
}

$reponse -> closeCursor();
?>
