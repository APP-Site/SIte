<?php

require_once ('modeles/modele_connexion_bdd.php');

function actualite() {
  $bdd = bddConnect();
  $req = $bdd -> query('SELECT * FROM sujet_actualite ORDER BY date_sujet DESC LIMIT 0, 5');
  return $req;
}

function sujet_actu($id) {
  $bdd = bddConnect();
  $req = $bdd -> prepare('SELECT * FROM sujet_actualite WHERE id_sujet = ?');
  $req -> execute(array($id));
  $res = $req -> fetch();
  return $res;
}

function update_profil($type, $modif, $code) {
  $bdd = bddConnect();
  $req = $bdd -> prepare('UPDATE utilisateur SET ' .$type. ' = ? WHERE code = ?');
  $req -> execute(array($modif, $code));
}

function insert_piece($nom, $code) {
  $bdd = bddConnect();
  $req = $bdd -> prepare('INSERT INTO possession_piece (nom, code) VALUES (?, ?)');
  $req -> execute(array($nom, $code));
}

function select_piece($code){  // sélectionner les pièces de l'utilisateur grâce à son code
  $bdd = bddConnect();
  $req = $bdd->prepare('SELECT * FROM possession_piece WHERE code = ?');
  $req -> execute(array($code));
  return $req;
}

function delete_piece($piece, $code) {
  $bdd = bddConnect();
  $req = $bdd -> prepare ('DELETE FROM possession_piece WHERE nom = ? AND code = ?');
  $req -> execute(array($piece, $code));
}

function delete_capteur($piece, $code) {
  $bdd = bddConnect();
  $req = $bdd -> prepare('DELETE FROM possession_capteur WHERE nom_piece = ? AND code = ?');
  $req -> execute(array($piece, $code));
}

function select_capteur_actionneur($code){ //selectionne les capteurs_actionneur de l'utilisateur

  $bdd = bddConnect();
  $req = $bdd->prepare('SELECT * FROM possession_capteur, capteur WHERE possession_capteur.id_capteur = capteur.id AND code = ?');
  $req -> execute(array($code));
  return $req;
}

function select_donnee($data2){ // sélectionne les vlaeurs du capteur_actionneur
  $bdd = bddConnect();
  $req = $bdd->prepare('SELECT valeur FROM donnee WHERE id_possession_capteur = ?');
  $req -> execute(array($data2));
  $res = $req->fetch();
  return $res;
}

function select_type(){
  $bdd = bddConnect();
  $req = $bdd -> query('SELECT * FROM capteur ');
  return $req;
}

function id_type($capteur) {
  $bdd = bddConnect();
  $req = $bdd -> prepare('SELECT id FROM capteur WHERE type = ?');
  $req -> execute(array($capteur));
  $res = $req -> fetch();
  return $res['id'];
}

function type($piece, $code) {
  $bdd = bddConnect();
  $req = $bdd -> prepare('SELECT * FROM capteur, possession_capteur WHERE nom_piece = ? AND code = ? AND id_capteur = capteur.id ');
  $req -> execute(array($piece, $code));
  return $req;
}

function ajout_capteur($id_capteur, $piece, $code){
  $bdd = bddConnect();
  $req = $bdd->prepare('INSERT INTO possession_capteur(id_capteur, etat, fonctionnement, nom_piece, code) VALUES (?, 1, 1, ?, ?)');
  $req -> execute(array($id_capteur, $piece, $code));
}

function suppression_capteur($id_capteur, $piece, $code) {
  $bdd = bddConnect();
  $req = $bdd -> prepare ('DELETE FROM possession_capteur WHERE code = ? AND id_capteur = ? AND nom_piece = ?');
  $req -> execute(array($code, $id_capteur, $piece));
}

function sujet_forum(){ //sélectionne les 5 derniers sujets
  $bdd = bddConnect();
  $req = $bdd->query('SELECT * FROM sujet_forum, utilisateur WHERE sujet_forum.code = utilisateur.code ORDER BY date_sujet_forum DESC LIMIT 0, 5');
  return $req;
}

function poste_topic($titre, $contenu, $code) { // poste un sujet de forum
  $bdd = bddConnect();
  $req = $bdd->prepare('INSERT INTO sujet_forum (titre_sujet_forum, contenu_sujet_forum, code, date_sujet_forum) VALUES(?, ?, ?, NOW())');
  $req -> execute(array($titre, $contenu, $code));
}

function select_topic($id) { // sélectionne un sujet de forum
  $bdd = bddConnect();
  $req = $bdd -> prepare('SELECT * FROM sujet_forum INNER JOIN utilisateur WHERE id_sujet_forum= ? AND utilisateur.code = sujet_forum.code');
  $req -> execute(array($id));
  $res = $req -> fetch();
  return $res;
}

function select_commentaire($id) { // sélectionne les commentaires correspondant au sujet sélectionné
  $bdd = bddConnect();
  $req = $bdd -> prepare('SELECT utilisateur.prenom, utilisateur.nom, contenu_commentaire, date_commentaire FROM sujet_forum, commentaire_sujet_forum, utilisateur WHERE id_sujet_forum = ? AND id_topic = ? AND utilisateur.code = commentaire_sujet_forum.code ORDER BY date_commentaire');
  $req -> execute(array($id, $id));
  return $req;
}

function poste_commentaire($id, $contenu, $code) { // poste un commentaire sur la page du sujet correspondant
  $bdd = bddConnect();
  $req = $bdd -> prepare('INSERT INTO commentaire_sujet_forum (id_topic, contenu_commentaire, code, date_commentaire) VALUES(?, ?, ?, NOW())');
  $req -> execute(array($id, $contenu, $code));
}
