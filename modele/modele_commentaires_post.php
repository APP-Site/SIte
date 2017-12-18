<?php session_start() ?>

<?php
// Connexion à la base de données

include('../modele/modele_connexion_bdd.php');

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO commentaire_sujet_forum (id_topic, contenu_commentaire, code, date_commentaire) VALUES(?, ?, ?, NOW())');
$req->execute(array($_GET['topic'], $_POST['contenu_commentaire'], $_SESSION['code']));
$topic=$_GET['topic'];

// Redirection du visiteur vers la page du minichat
header('Location: ../vues/vue_forum_topic.php?titre=Sujet&topic='.$topic.'');
?>