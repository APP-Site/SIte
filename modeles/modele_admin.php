<?php

require_once ('modeles/modele_connexion_bdd.php');

function select_client($code) {
  $bdd = bddConnect();
  $req = $bdd -> prepare('SELECT * FROM utilisateur WHERE code = ?');
  $req -> execute(array($code));
  $res = $req -> fetch();
  return $res;
}

function ajout_capteur($type, $unite, $image, $ref) {
  $bdd = bddConnect();
  $req = $bdd -> prepare ('INSERT INTO capteur_actionneur (type, unite, image, reference, statut) VALUES (?, ?, ?, ?, "capteur")');
  $req -> execute(array($type, $unite, $image, $ref));
}

function delete_client($code) {
  $bdd = bddConnect();
  $req = $bdd -> prepare ('DELETE FROM utilisateur WHERE code = ?');
  $req -> execute(array($code));
}

function delete_capteur($code) {
  $bdd = bddConnect();
  $req = $bdd -> prepare ('DELETE FROM possession_capteur_actionneur WHERE code = ?');
  $req -> execute(array($code));
}

function delete_piece($code) {
  $bdd = bddConnect();
  $req = $bdd -> prepare ('DELETE FROM possession_piece WHERE code = ?');
  $req -> execute(array($code));
}
