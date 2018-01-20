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
  delete_capteur_client($code);
  header ('Location: index.php?action=admin');
}

function admin_capteur($ref) {
  require ('modeles/modele_admin.php');
  $capteur = select_capteur($ref);
  require ('vues/vue_admin.php');
}

function supprimer_capteur($ref) {
  require ('modeles/modele_admin.php');
  delete_capteur($ref);
  header ('Location: index.php?action=admin');
}

function admin_ajout_actualite($sujet, $cont) {
  require ('modeles/modele_admin.php');
  ajout_actu($sujet, $cont);
  header ('Location: index.php?action=admin');
}
