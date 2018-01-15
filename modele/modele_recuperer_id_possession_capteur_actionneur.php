<?php
//On veut recuperer ici, l'id de la ligne à supprimer dans la table possession_capteur_actionneur

//On recupère donc dans la table possession_capteur_actionneur l'id de la ligne comportant le bon code la bonne pièce et le bon id_possession_capteur_actionneur
$reponse = $bdd->prepare('SELECT id FROM possession_capteur_actionneur WHERE code=? AND nom_piece=? AND id_capteur_actionneur=?');
$reponse->execute(array($_SESSION['code'], $_SESSION['piece'], $_SESSION['capteur']));

while ($donnees=$reponse->fetch())
{
  $id_suppression=$donnees['id'];
}

$reponse->closeCursor();
 ?>
