<?php

try
{
    $bdd = new PDO('mysql:host=localhost:3306;dbname=domisep;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare("INSERT INTO piece(salon, cuisine, toilettes, chambre, bureau, salle_de_bain) VALUES(:salon, :cuisine, :toilettes, :chambre, :bureau, :salle_de_bain)");

$req->execute(array(

':salon' => $_POST['salon'],
':cuisine' => $_POST['cuisine'],
':toilettes' => $_POST['toilettes'],
':chambre' => $_POST['chambre'],
':bureau' => $_POST['bureau'],
':salle_de_bain' => $_POST['salle_de_bain']));

echo 'cc';
$req -> closeCursor();

