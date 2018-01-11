<?php

require_once ('modeles/modele_connexion_bdd.php');

function verif_email($email){
  $bdd = bddConnect();
  $req = $bdd->prepare('SELECT * FROM utilisateur WHERE email = ? ');
  $req -> execute(array($email));
  $req = $req->rowCount();
  return $req ;
}

function verif_mdp($email){
  $bdd = bddConnect();
  $req = $bdd-> prepare('SELECT * FROM utilisateur WHERE email= ?');
  $req->execute(array($email));
  $donnee = $req->fetch();
  return $donnee;
}

function verif_email_code($email){
  $bdd = bddConnect();
  $req = $bdd->prepare('SELECT * FROM nouveau_client WHERE email = ? ');
  $req -> execute(array($email));
  $req = $req->rowCount();
  return $req ;
}

function verif_code2($email){
  $bdd = bddConnect();
  $req = $bdd-> prepare('SELECT * FROM nouveau_client WHERE email= ?');
  $req->execute(array($email));
  $donnee = $req->fetch();
  return $donnee['code'];
}

function inser_inscription($nom, $prenom, $adresse, $codep, $ville, $portable, $mdp, $email, $code){
  $bdd = bddConnect();
  $req = $bdd->prepare("INSERT INTO utilisateur(id, nom, prenom, adresse, code_postal, ville, email, pass, telephone_portable, code) VALUES('', :nom, :prenom, :adresse, :code_postal, :ville, :email, :pass, :telephone_portable, :code)");
  $req->execute(array(
      ':nom' => $nom,
      ':prenom' => $prenom,
      ':adresse'=> $adresse,
      ':code_postal'=> $codep,
      ':ville'=> $ville,
      ':email' => $email,
      ':pass' => $mdp,
      ':telephone_portable'=> $portable,
      ':code' => $code,
    ));
  }
?>
