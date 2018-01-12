<?php
  function connexion() {  // renvoie vers la page de connexion
    require ('vues/vue_pConnexion.php');
  }

  function verif_connexion($email, $mdp){ // vérifie l'email et le mot de passe entrer
    require ('modeles/modele_connecter_utilisateur.php');

    $nb = verif_email($email);
    if ($nb == 1){ // cette condition permet de vérifier si l'email existe (sinon $nb affiche 0)
      $donnee = verif_mdp($email);
      $mdp_crypte = sha1($mdp);
      if ($mdp == $donnee['pass']){ // remplacer $mdp par $mdp_crypte quand la table sera jour. Si le mot de passe correspond à l'email l'utilisateur peut se connecter
        session_start();
        $_SESSION['nom'] = $donnee['nom'];
        $_SESSION['prenom'] = $donnee['prenom'];
        $_SESSION['adresse'] = $donnee['adresse'];
        $_SESSION['code_postal'] = $donnee['code_postal'];
        $_SESSION['ville'] = $donnee['ville'];
        $_SESSION['telephone_portable'] = $donnee['telephone_portable'];
        $_SESSION['email'] = $donnee['email'];
        $_SESSION['code'] = $donnee['code'];

        header ('Location: index.php?action=tableau_bord'); // redirection vers le tableau de bord
      }
      else{
        throw new Exception('Le mot de passe ou l\'email sont faux'); //si le mot de passe ne correspond pas à l'email
      }
    }
    else{
      throw new Exception('L\'email est faux!'); // si $nb renvoie 0
    }
  }

  function inscription(){ // renvoie vers la page de verification de code
    require ('vues/vue_verif_code.php');
  }

  function verif_code($email, $code){  // vérifie l'email et le code entrer
    require ('modeles/modele_connecter_utilisateur.php');

    $nb = verif_email_code($email);
    if ($nb == 1) { // cette condition permet de vérifier si l'email existe (sinon $nb affiche 0)
      $donnee = verif_code2($email);
      if ($code == $donnee){ // Si le code correspond à l'email l'utilisateur peut passer à l'étape d'inscription
        header ('Location: index.php?action=formulaire_inscription&email=' .$email. '&code=' .$code);
      }
      else{
        throw new Exception('Le code ou l\'email sont faux'); //si le code ne correspond pas à l'email
      }
    }
    else {
      throw new Exception('L\'email est faux!');
    }
  }


function formulaire_inscription(){ // renvoie le formulaire d'inscription
  require ('vues/vue_formulaire_inscription.php');
}

function poste_inscription($email, $code, $nom, $prenom, $adresse, $codep, $ville, $portable, $mdp){
  require ('modeles/modele_connecter_utilisateur.php');

  $mdp_crypte = sha1($mdp);
  inser_inscription($nom, $prenom, $adresse, $codep, $ville, $portable, $mdp_crypte, $email, $code);
  suppression($email, $code);
  header ('Location: index.php?');
} // insère dans la table client les données et supprime dans la table nouveau_client la ligne correspondante

function deconnexion(){ // Permet de se déconnecter et de renvoyer vers la page de connexion
  session_destroy();
  header('Location: index.php');
}

 ?>
