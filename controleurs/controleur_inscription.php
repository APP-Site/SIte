<!DOCTYPE html>

<?php

include('../modele/modele_connexion_bdd.php') ;

$req = $bdd->prepare("INSERT INTO utilisateur(id, nom, prenom, adresse, code_postal, ville, email, pass, telephone_portable, code) VALUES('', :nom, :prenom, :adresse, :code_postal, :ville, :email, :pass, :telephone_portable, :code)");
$req->execute(array(
    ':nom' => $_POST['nom'],
    ':prenom' => $_POST['prenom'],
    ':adresse'=> $_POST['adresse'],
    ':code_postal'=> $_POST['code_postal'],
    ':ville'=> $_POST['ville'],
    ':email' => $_POST['email'],
    ':pass' => $_POST['pass'],
    ':telephone_portable'=> $_POST['telephone_portable'],
    ':code' => $_POST['code'],
));

  echo "Inscription effectuée!";
  $req->closeCursor();

 
  
  header ('Location: ../vues/vue_page_de_connexion.php');

?>
<html>
</html>