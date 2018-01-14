<?php

include('../modele/modele_connexion_bdd.php');

$req = $bdd->prepare("INSERT INTO capteur_actionneur(type, unite, reference, image, statut) VALUES(:type, :unite, :reference, :image, :statut)");
$req->execute(array(
    ':type' => $_POST['type'],
    ':unite' => $_POST['unite'],
    ':reference' => $_POST['ref'],
    ':image' => $_POST['image'],
    ':type' => $_POST['type'],
    ':statut' => $_POST['statut']
));

?>
