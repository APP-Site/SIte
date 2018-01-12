<?php

require_once ('modeles/modele_connexion_bdd.php');

function verif_email($email){ // compte le nombre de ligne dans la table utilisateur qui a l'email = $email
  $bdd = bddConnect();
  $req = $bdd->prepare('SELECT * FROM utilisateur WHERE email = ? ');
  $req -> execute(array($email));
  $req = $req->rowCount();
  return $req ;
}

function verif_mdp($email){ // sélectionne la ligne dans la table utilisateur qui contient l'email = $email
  $bdd = bddConnect();
  $req = $bdd-> prepare('SELECT * FROM utilisateur WHERE email= ?');
  $req->execute(array($email));
  $donnee = $req->fetch();
  return $donnee;
}

function verif_email_code($email){ // compte le nombre de ligne dans la table client qui a l'email = $email
  $bdd = bddConnect();
  $req = $bdd->prepare('SELECT * FROM nouveau_client WHERE email = ? ');
  $req -> execute(array($email));
  $req = $req->rowCount();
  return $req ;
}

function verif_code2($email){ // sélectionne la ligne dans la table nouveau_client qui contient l'email = $email
  $bdd = bddConnect();
  $req = $bdd-> prepare('SELECT * FROM nouveau_client WHERE email= ?');
  $req->execute(array($email));
  $donnee = $req->fetch();
  return $donnee['code'];
}

function inser_inscription($nom, $prenom, $adresse, $codep, $ville, $portable, $mdp, $email, $code){ // insert ces données dans la table utilisateur
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

  function suppression($email, $code){ // supprime la ligne dans la table nouveau_client contenant l'email $email et le code $code
    $bdd = bddConnect();
    $req = $bdd -> prepare('DELETE FROM nouveau_client WHERE email= ? AND code= ?');
    $req->execute(array($email, $code));
  }
?>
