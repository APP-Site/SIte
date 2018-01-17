<?php
//On veut trouver pour un actionneur seletionné quel est son id dans la table capteur_actionneur pour ensuite savoir quoi mettre dans id_capteur_actionneur

//On récupère dans la table capteur_actionneur l'id de l'actionneur et son nom
$reponse = $bdd->query('SELECT id, type FROM capteur_actionneur');

//Test quel id correspond à celui selectionné par l'utilisateur
while($donnees = $reponse->fetch())
{
  if($donnees['type']==$_SESSION['actionneur'])
  {
    $_SESSION['actionneur']=$donnees['id'];
  }
}

$reponse -> closeCursor();
?>
