<?php

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
