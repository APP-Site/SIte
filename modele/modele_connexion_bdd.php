<?php

try
{
<<<<<<< HEAD
    $bdd = new PDO('mysql:host=localhost:8889;dbname=domisep;charset=utf8', 'root', 'root');
=======
    $bdd = new PDO('mysql:host=localhost:3306;dbname=domisep', 'root', 'root');
>>>>>>> 4520598a6590f19613c3bd706c683e86ab64d164
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

 ?>
