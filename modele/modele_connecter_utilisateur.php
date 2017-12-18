<?php
function connecterutilisateur($email,$bdd)
{
    $req = $bdd->prepare('SELECT * FROM utilisateur WHERE email = :email');
    $req->execute(array(
        'email' => $email));
    return $req;
}
?>
