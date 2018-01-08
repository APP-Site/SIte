<?php

include(../modele/modele_connexion_bdd.php);

$req = $bdd->prepare("INSERT INTO piece(nom) VALUES(:nom)");

$req->execute(array(


':nom' => $_POST['nom'],
));

echo $_POST['nom'];
$req -> closeCursor();
?>
