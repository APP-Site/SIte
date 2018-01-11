<?php

include('../modele/modele_connexion_bdd.php');


if (isset($_POST['search']))
{
    $code=htmlspecialchars($_POST['search']);
    $reponse = $bdd->query('SELECT * FROM utilisateur WHERE code = "'.$code.'"');
    $client=$reponse->fetch();
}

?>
