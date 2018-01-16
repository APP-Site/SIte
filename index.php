<?php
  require ('controleurs/client_connexion.php');
  require ('controleurs/client_site.php');

  try {
    if (isset($_GET['action'])) {
      if ($_GET['action'] == 'verif_connexion') {
        if (!empty($_POST['email']) && !empty($_POST['pass'])) {
          verif_connexion($_POST['email'], $_POST['pass']);
        }
        else { throw new Exception('Tous les champs ne sont pas remplis !'); }
      }

      elseif ($_GET['action'] == 'inscription') {
        inscription();
      }

      elseif ($_GET['action'] == 'verif_code') {
        if (!empty($_POST['email']) && !empty($_POST['code'])) {
          verif_code($_POST['email'], $_POST['code']);
        }
        else { throw new Exception('Tous les champs ne sont pas remplis !'); }
      }


      elseif ($_GET['action'] == 'formulaire_inscription'){
        formulaire_inscription();
      }

      elseif ($_GET['action'] == 'poste_inscription'){
        if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['adresse']) && !empty($_POST['code_postal']) && !empty($_POST['ville']) && !empty($_POST['telephone_portable']) && !empty($_POST['pass'])) {
          poste_inscription($_GET['email'], $_GET['code'], $_POST['nom'], $_POST['prenom'], $_POST['adresse'], $_POST['code_postal'], $_POST['ville'], $_POST['telephone_portable'], $_POST['pass']);
        }
        else { throw new Exception('Tous les champs ne sont pas remplis !'); }
      }

      elseif ($_GET['action'] == 'tableau_bord'){
        tableau_bord();
      }

      elseif ($_GET['action'] == 'ajout_1'){
        ajout_1();
      }

      elseif ($_GET['action'] == 'ajout_type'){
        if (!empty($_POST['capteur'])){
          ajout_type($_POST['capteur']);
        }
        else { throw new Exception('Veuillez sélectionner un type de capteur !'); }
      }

      elseif ($_GET['action'] == 'ajout_2'){
        ajout_2();
      }

      elseif ($_GET['action'] == 'ajout_piece'){
        if (!empty($_POST['piece'])){
          ajout_piece($_POST['piece']);
        }
        else { throw new Exception('Veuillez sélectionner la pièce où mettre le capteur !'); }
      }

      elseif ($_GET['action'] == 'validation_ajout'){
        validation_ajout();
      }

      elseif ($_GET['action'] == 'profil') {
        profil();
      }

      elseif ($_GET['action'] == 'information'){
        information();
      }

      elseif ($_GET['action'] == 'forum'){
        forum();
      }

      elseif ($_GET['action'] == 'creation_topic'){
        if (!empty($_POST['titre_sujet_forum']) && !empty($_POST['contenu_sujet_forum'])){
          creation_topic($_POST['titre_sujet_forum'], $_POST['contenu_sujet_forum']);
        }
        else { throw new Exception('Tous les champs ne sont pas remplis !'); }
      }

      elseif ($_GET['action'] == 'topic'){
        topic($_GET['topic']);
      }

      elseif ($_GET['action'] == 'creation_commentaire'){
        if (!empty($_POST['contenu_commentaire'])){
          creation_commentaire($_GET['id'], $_POST['contenu_commentaire']);
        }
        else { throw new Exception('Tous les champs ne sont pas remplis !'); }
      }

      elseif ($_GET['action'] == 'deconnexion'){
        deconnexion();
      }
    }
    else {
      connexion();
    }
  }



  catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
  }
?>
