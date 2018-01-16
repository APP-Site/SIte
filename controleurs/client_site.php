<?php

  function tableau_bord() { //revoie le tableau de bord
    session_start();
    $code=htmlspecialchars($_SESSION['code']);

    require ('modeles/modele_site.php');
    $pieces = select_piece($code); // sélectionne toute les pieces qui portent le code de l'utilisateur
    require ('vues/vue_ajout_suppression.php');
  }

  function ajout_1() {
    session_start();
    $code=htmlspecialchars($_SESSION['code']);
    require ('modeles/modele_site.php');
    $types = select_type();
    $pieces = select_piece($code); // sélectionne toute les pieces qui portent le code de l'utilisateur
    require ('vues/vue_ajout_1.php');
  }

  function ajout_type($capteur) {
    session_start();
    $_SESSION['capteur'] = $capteur; // garder en mémoire le type de capteur sélecctionné
    header ('Location: index.php?action=ajout_2');
  }

  function ajout_2() {
    session_start();
    $code=htmlspecialchars($_SESSION['code']);
    require ('modeles/modele_site.php');
    $pieces_ajout = select_piece($code); // affiche les pieces du client pour ajouter un capteur
    $pieces = select_piece($code); // affiche les pieces du client pour visualisation du tableau de bord
    require ('vues/vue_ajout_2.php');
  }

  function ajout_piece($piece) {
    session_start();
    $_SESSION['piece'] = $piece; // garder en mémoire le choix de la pièce
    header ('Location: index.php?action=validation_ajout');
  }

  function validation_ajout(){
    session_start();
    $code=htmlspecialchars($_SESSION['code']);
    require ('modeles/modele_site.php');
    $pieces = select_piece($code); // affiche les pieces du client pour visualisation du tableau de bord
    require ('vues/vue_ajout_validation.php');
  }

  function profil() { // renvoie la page profil
    session_start();
    require ('vues/vue_profil.php');
  }

  function information() { //renvoie la page information
    session_start();
    $code = htmlspecialchars($_SESSION['code']);

    require ('modeles/modele_site.php');
    $pieces = select_piece($code); // sélectionne toute les pieces qui portent le code de l'utilisateur
    require ('vues/vue_information.php');
  }

  function forum() { // renvoie le forum
    session_start();
    require ('modeles/modele_site.php');
    $sujets = sujet_forum(); // sélectionne les cinq derniers topics pour les afficher
    require ('vues/vue_page_forum.php');
  }

  function creation_topic($titre, $contenu) { // ajoute un topic dans le forum
    session_start();
    $code = $_SESSION['code'];
    require ('modeles/modele_site.php');
    poste_topic($titre, $contenu, $code); // la variable $code permet de déterminer quel utilisateur poste ce topic
    header ('Location: index.php?action=forum'); // après l'ajout la page est redirigé vers le forum
  }

  function topic($id) { // cliquer sur un sujet dans le forum permet d'afficher ses commentaires associés
    session_start();
    require ('modeles/modele_site.php');
    $topic = select_topic($id); // récupère les informations du topic sélectionné
    $commentaires = select_commentaire($id); // récupère les commentaires du topic sélectionné
    require ('vues/vue_topic_forum.php');
  }

  function creation_commentaire($id, $contenu){ // rajouter un commentaire
    session_start();
    $code = $_SESSION['code'];
    require ('modeles/modele_site.php');
    poste_commentaire($id, $contenu, $code); // la variable $code permet de déterminer quel utilisateur poste ce commentaire
    header ('Location: index.php?action=topic&topic=' .$id); // après lajout la page estt redirigé vers le sujet en question
  }
