<?php

require_once ('modeles/modele_connexion_bdd.php');

function select_piece($code){  // sélectionner les pièces de l'utilisateur grâce à son code

  $bdd = bddConnect();
  $req = $bdd->prepare('SELECT * FROM possession_piece WHERE code = ?');
  $req -> execute(array($code));
  return $req;
}

function select_capteur_actionneur($code){ //selectionne les capteurs_actionneur de l'utilisateur

  $bdd = bddConnect();
  $req = $bdd->prepare('SELECT * FROM possession_capteur_actionneur, capteur_actionneur WHERE possession_capteur_actionneur.id_capteur_actionneur = capteur_actionneur.id AND code = ?');
  $req -> execute(array($code));
  return $req;
}

function select_donnee($data2){ // sélectionne les vlaeurs du capteur_actionneur
  $bdd = bddConnect();
  $req = $bdd->prepare('SELECT valeur FROM donnee WHERE id_possession_capteur_actionneur = ?');
  $req -> execute(array($data2));
  $res = $req->fetch();
  return $res;
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
  $req = $bdd -> prepare('SELECT utilisateur.prenom, utilisateur.nom, contenu_commentaire, date_commentaire FROM sujet_forum, commentaire_sujet_forum, utilisateur WHERE id_topic = ? AND utilisateur.code = commentaire_sujet_forum.code ORDER BY date_commentaire');
  $req -> execute(array($id));
  return $req;
}

function poste_commentaire($id, $contenu, $code) { // poste un commentaire sur la page du sujet correspondant
  $bdd = bddConnect();
  $req = $bdd -> prepare('INSERT INTO commentaire_sujet_forum (id_topic, contenu_commentaire, code, date_commentaire) VALUES(?, ?, ?, NOW())');
  $req -> execute(array($id, $contenu, $code));
}
