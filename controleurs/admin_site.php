<?php

function admin() {
  require ('modeles/modele_admin.php');
  require ('vues/vue_admin.php');
}

function admin_client($code) {
  require ('modeles/modele_admin.php');
  $client = select_client($code);
  require ('vues/vue_admin.php');
}

function admin_ajout_capteur($type, $unite, $image, $ref) {
  require ('modeles/modele_admin.php');
  ajout_capteur($type, $unite, $image, $ref);
  header ('Location: index.php?action=admin');
}

function supprimer_client($code) {
  require ('modeles/modele_admin.php');
  delete_client($code);
  delete_piece($code);
  delete_capteur($code);
  header ('Location: index.php?action=admin');
}
