<?php

  function tableau_bord() {
    session_start();
    $code=htmlspecialchars($_SESSION['code']);

    require ('modeles/modele_site.php');
    $pieces = select_piece($code);
    require ('vues/vue_tableau_de_bord.php');
  }

  function profil() {
    session_start();
    require ('vues/vue_profil.php');
  }

  function information() {
    session_start();
    $code = htmlspecialchars($_SESSION['code']);

    require ('modeles/modele_site.php');
    $pieces = select_piece($code);
    require ('vues/vue_information.php');
  }

  function forum() {
    session_start();
    require ('modeles/modele_site.php');
    $sujets = sujet_forum();
    require ('vues/vue_page_forum.php');
  }

  function creation_topic($titre, $contenu) {
    session_start();
    $code = $_SESSION['code'];
    require ('modeles/modele_site.php');
    poste_topic($titre, $contenu, $code);
    header ('Location: index.php?action=forum');
  }

  function topic($id) {
    session_start();
    require ('modeles/modele_site.php');
    $topic = select_topic($id);
    $commentaires = select_commentaire($id);
    require ('vues/vue_topic_forum.php');
  }

  function creation_commentaire($id, $contenu){
    session_start();
    $code = $_SESSION['code'];
    require ('modeles/modele_site.php');
    poste_commentaire($id, $contenu, $code);
    header ('Location: index.php?action=topic&topic=' .$id);
  }
