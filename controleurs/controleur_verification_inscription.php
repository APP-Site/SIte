<!DOCTYPE html>
<?php

include('../modele/modele_connexion_bdd.php');

$email = $_POST['email'];
$code = $_POST['code'];

include('../modele/modele_verification_code.php');


$resultat = connecterutilisateur($email,$bdd)->fetch();

if( $resultat['code'] != $code)
{

    echo 'Mauvais identifiant ou code !';
    header('Location: ../vues/vue_erreur_inscription.php');//aller vers verification inscription avec un message d'erreur
}
else
{
    header("Location: ../vues/vue_formulaire_inscription.php?code=$code&email=$email"); // aller vers le formulaire inscription
}
?>

<html>
</html>
