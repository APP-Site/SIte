<?php
function connecterutilisateur($email,$bdd)
{
    $req = $bdd->prepare('SELECT * FROM nouveau_client WHERE email = :email');
    $req->execute(array(
        'email' => $email));
    return $req;
}
?>