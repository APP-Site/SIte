<?php

<<<<<<< HEAD
include('../modele/modele_connexion_bdd.php');

$req = $bdd->prepare("INSERT INTO piece(nom_piece, nom, prenom, email) VALUES(:nom_piece, :nom, :prenom, :email)");
$req->execute(array(
    ':nom' => $_POST['nom'],
    ':prenom' => $_POST['prenom'],
    ':email' => $_POST['email'],
    ':nom_piece' => $_POST['nom_piece'],

));

  echo $piece;

  $req->closeCursor();
=======
include(../modele/modele_connexion_bdd.php);

$nom_piece = $_POST['nom_piece']

$req = $bdd->prepare('INSERT INTO possession_piece(nom_piece) VALUES(:nom_piece)');

$req->execute(array(

':nom_piece' => $nom_piece
));

echo $nom_piece;

$req -> closeCursor();
a
?>
>>>>>>> 4520598a6590f19613c3bd706c683e86ab64d164
