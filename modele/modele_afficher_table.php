<?php

try {
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost:3306;dbname=domisep;charset=utf8', 'root', 'root');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table
$reponse = $bdd->query('SELECT * FROM utilisateur');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch()) {
    echo "<strong>nom</strong> : " . $donnees['nom'] . "<br/>";
}

$reponse->closeCursor(); // Termine le traitement de la requête
?>