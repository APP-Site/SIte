<?php
  require ('controleurs/controleur_connexion.php');
  require ('controleurs/client_site.php');
  require ('controleurs/client_tableau_bord.php');
  require ('controleurs/admin_site.php');

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

      elseif ($_GET['action'] == "editeur") {
        editeur();
      }

      elseif ($_GET['action'] == "poste_piece") {
        if (!empty($_POST['id_piece'])) {
          poste_piece($_POST['id_piece']);
        }
        else { throw new Exception('Veuillez écire le nom d\'une de vos pièces!');}
      }

      elseif ($_GET['action'] == "supprimer_piece") {
        if (!empty($_GET['piece'])) {
          supprimer_piece($_GET['piece']);
        }
      }

      elseif ($_GET['action'] == "rajout_piece") {
        if (!empty($_POST['rajout_piece'])) {
          rajout_piece($_POST['rajout_piece']);
        }
        else { throw new Exception('Veuillez rentre le nom d\'une pièce avant de valider !'); }
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

      elseif ($_GET['action'] == 'valider'){
        validation_capteur();
      }

      elseif ($_GET['action'] == 'annuler'){
        annulation_capteur();
      }

      elseif ($_GET['action'] == 'precedent') {
        precedent_capteur();
      }

      elseif ($_GET['action'] == 'suppression_1'){
        suppression_1();
      }

      elseif ($_GET['action'] == 'sup_piece') {
        if (!empty($_POST['piece'])){
          sup_piece($_POST['piece']);
        }
        else { throw new Exception('Veuillez sélectionner la pièce qui contient le capteur voulu !'); }
      }

      elseif ($_GET['action'] == 'suppression_2') {
        suppression_2();
      }

      elseif ($_GET['action'] == 'sup_type') {
        if (!empty($_POST['capteur'])){
          sup_type($_POST['capteur']);
        }
        else { throw new Exception('Veuillez sélectionner la pièce qui contient le capteur voulu !'); }
      }

      elseif ($_GET['action'] == 'validation_suppression') {
        validation_suppression();
      }

      elseif ($_GET['action'] == 'valider_sup') {
        valider_sup();
      }

      elseif ($_GET['action'] == 'precedent_sup') {
        precedent_sup();
      }

      elseif ($_GET['action'] == 'profil') {
        profil();
      }

      elseif ($_GET['action'] == 'modifier_nom' || $_GET['action'] == 'modifier_prenom' || $_GET['action'] == 'modifier_telephone' || $_GET['action'] == 'modifier_email') {
        profil();
      }

      elseif ($_GET['action'] == 'modification_nom' || $_GET['action'] == 'modification_prenom' || $_GET['action'] == 'modification_telephone' || $_GET['action'] == 'modification_email') {
        if (!empty($_GET['type']) && !empty($_POST['modif'])) {
          modifier_profil($_GET['type'], $_POST['modif']);
        }
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

      elseif ($_GET['action'] == "admin") {
        admin();
      }

      elseif ($_GET['action'] == "admin_recherche_client") {
        if (!empty($_POST['search_admin'])) {
          admin_client($_POST['search_admin']);
        }
        else { throw new Exception('Veuillez insérer un code client !'); }
      }

      elseif ($_GET['action'] == "admin_recherche_capteur") {
        if (!empty($_POST['capt_admin'])) {
          admin_capteur($_POST['capt_admin']);
        }
        else { throw new Exception('Veuillez insérer un code client !'); }
      }

      elseif ($_GET['action'] == "admin_ajout_capteur") {
        if (!empty($_POST['type']) && !empty($_POST['unite']) && !empty($_POST['image']) &&!empty($_POST['ref'])) {
          admin_ajout_capteur($_POST['type'], $_POST['unite'], $_POST['image'], $_POST['ref']);
        }
        else { throw new Exception('Tous les champs ne sont pas remplis !'); }
      }

      elseif ($_GET['action'] == "admin_ajout_actualite") {
        if (!empty($_POST['sujet_actu']) && !empty($_POST['contenu_actu'])) {
          admin_ajout_actualite($_POST['sujet_actu'], $_POST['contenu_actu']);
        }
        else { throw new Exception('Tous les champs ne sont pas remplis !'); }
      }

      elseif ($_GET['action'] == "supprimer_client") {
        if (!empty($_GET['code'])) {
          supprimer_client($_GET['code']);
        }
      }

      elseif ($_GET['action'] == "supprimer_capteur") {
        if (!empty($_GET['ref'])) {
          supprimer_capteur($_GET['ref']);
        }
      }

      elseif ($_GET['action'] == "actualite") {
        if (!empty($_GET['id'])) {
          contenu_actualite($_GET['id']);
        }
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
