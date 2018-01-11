<?php

include(../modele/modele_connexion_bdd.php);

$nom_piece = $_POST['nom_piece']

$req = $bdd->prepare('INSERT INTO possession_piece(nom_piece) VALUES(:nom_piece)');

$req->execute(array(

':nom_piece' => $nom_piece
));

echo $nom_piece;

$req -> closeCursor();

?>
