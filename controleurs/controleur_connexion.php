<?php

include('../modele/modele_connexion_bdd.php');

$email = $_POST['email'];
$pass = $_POST['pass'];

include('../modele/modele_connecter_utilisateur.php');


$resultat = connecterutilisateur($email,$bdd)->fetch();

if( $resultat['pass'] != $pass)
{
    header('Location: ../vues/vue_page_de_connexion.php');
    echo 'Mauvais identifiant ou mot de passe !';
    
}
else
{   
    session_start();
    $_SESSION['nom'] = $resultat['nom'];
    $_SESSION['prenom'] = $resultat['prenom'];
    $_SESSION['adresse'] = $resultat['adresse'];
    $_SESSION['code_postal'] = $resultat['code_postal'];
    $_SESSION['ville'] = $resultat['ville']; 
    $_SESSION['telephone_portable'] = $resultat['telephone_portable'];
    $_SESSION['email'] = $resultat['email'];
    $_SESSION['code'] = $resultat['code']; 
    
    
    header('Location: ../vues/vue_tableau_de_bord.php?titre=Tableau de bord');

}
 ?>
<!DOCTYPE html>
<html>
</html>