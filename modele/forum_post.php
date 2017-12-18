<?php session_start() ?>

<?php
// Connexion à la base de données

include('../modele/modele_connexion_bdd.php');

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO sujet_forum (titre_sujet_forum, contenu_sujet_forum, code, date_sujet_forum) VALUES(?, ?, ?, NOW())');
$req->execute(array($_POST['titre_sujet_forum'], $_POST['contenu_sujet_forum'], $_SESSION['code']));

// Redirection du visiteur vers la page du minichat
header('Location: ../vues/vue_page_forum.php?titre=Forum');
?>
