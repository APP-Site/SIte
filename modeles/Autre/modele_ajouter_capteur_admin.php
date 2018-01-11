<?php

include('../modele/modele_connexion_bdd.php');

$req = $bdd->prepare("INSERT INTO capteur_actionneur(reference, statut) VALUES(:reference, :capteur)");
$req->execute(array(
    ':reference' => $_POST['reference'],
    ':capteur' => "capteur"

));
