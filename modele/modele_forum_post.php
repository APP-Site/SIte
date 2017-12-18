<?php
// Connexion à la base de données

include('../Modele/modele_connexion_bdd.php');

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO sujet_forum (titre_sujet_forum, contenu_sujet_forum, date_sujet_forum) VALUES(?, ?, NOW())');
$req->execute(array($_POST['titre_sujet_forum'], $_POST['contenu_sujet_forum']));

// Redirection du visiteur vers la page du minichat
header('Location: vue_page_forum.php');
?>
