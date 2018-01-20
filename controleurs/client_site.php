<?php

  function editeur(){
    session_start();
    require('vues/vue_editeur.php');
  }

  function contenu_actualite($id) {
    session_start();
    require ('modeles/modele_site.php');
    $sujet_actu = sujet_actu($id);
    require ('vues/vue_actualite.php');
  }

  function poste_piece($piece){
    session_start();
    $piece = htmlspecialchars($piece);
    $code = htmlspecialchars($_SESSION['code']);
    require ('modeles/modele_site.php');
    insert_piece($piece, $code);
    header('Location: index.php?action=editeur');
  }

  function profil() { // renvoie la page profil
    session_start();
    require ('modeles/modele_site.php');
    require ('vues/vue_profil.php');
  }

  function modifier_profil($type, $modif) {
    session_start();
    require ('modeles/modele_site.php');
    $code = htmlspecialchars($_SESSION['code']);
    update_profil($type, $modif, $code);
    $_SESSION[$type] = $modif;
    header ('Location: index.php?action=profil');
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
