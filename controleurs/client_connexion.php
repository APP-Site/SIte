<?php
  function connexion() {
    require ('vues/vue_pConnexion.php');
  }

  function verif_connexion($email, $mdp){
    require ('modeles/modele_connecter_utilisateur.php');

    $nb = verif_email($email);
    if ($nb == 1){
      $donnee = verif_mdp($email);
      $mdp_crypte = sha1($mdp);
      if ($mdp == $donnee['pass']){ // remplacer $mdp par $mdp_crypte quand la table sera jour
        session_start();
        $_SESSION['nom'] = $donnee['nom'];
        $_SESSION['prenom'] = $donnee['prenom'];
        $_SESSION['adresse'] = $donnee['adresse'];
        $_SESSION['code_postal'] = $donnee['code_postal'];
        $_SESSION['ville'] = $donnee['ville'];
        $_SESSION['telephone_portable'] = $donnee['telephone_portable'];
        $_SESSION['email'] = $donnee['email'];
        $_SESSION['code'] = $donnee['code'];

        header ('Location: index.php?action=tableau_bord');
      }
      else{
        throw new Exception('Le mot de passe ou l\'email sont faux');
      }
    }
    else{
      throw new Exception('L\'email est faux!');
    }
  }

  function inscription(){
    require ('vues/vue_verif_code.php');
  }

  function verif_code($email, $code){
    require ('modeles/modele_connecter_utilisateur.php');

    $nb = verif_email_code($email);
    if ($nb == 1) {
      $donnee = verif_code2($email);
      if ($code == $donnee){
        header ('Location: index.php?action=formulaire_inscription&email=' .$email. '&code=' .$code);
      }
      else{
        header ('Location: index.php?action=erreur');
      }
    }
    else {
      throw new Exception('L\'email est faux!');
    }
  }

  function erreur(){
    require ('vues/vue_erreur_inscription.php');
  }

function formulaire_inscription(){
  require ('vues/vue_formulaire_inscription.php');
}

function poste_inscription($email, $code, $nom, $prenom, $adresse, $codep, $ville, $portable, $mdp){
  require ('modeles/modele_connecter_utilisateur.php');

  $mdp_crypte = sha1($mdp);
  inser_inscription($nom, $prenom, $adresse, $codep, $ville, $portable, $mdp_crypte, $email, $code);
  suppression($email, $code);
  header ('Location: index.php?');
}

function deconnexion(){
  session_destroy();
  header('Location: index.php');
}

 ?>
