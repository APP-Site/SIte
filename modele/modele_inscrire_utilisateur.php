<?php
function inscrireutilisateur($nom,$prenom,$adresse,$code_postal,$ville,$email,$pass,$telephone_portable)
{
  $req = $bdd->prepare("INSERT INTO utilisateur(nom, prenom, adresse, code_postal, ville, email, pass, telephone_portable) VALUES(:nom, :prenom, :adresse, :code_postal, :ville, :email, :pass, :telephone_portable)");
  $req->execute(array(
      ':nom' => $_POST['nom'],
      ':prenom' => $_POST['prenom'],
      ':adresse'=> $_POST['adresse'],
      ':code_postal'=> $_POST['code_postal'],
      ':ville'=> $_POST['ville'],
      ':email' => $_POST['email'],
      ':pass' => $_POST['pass'],
      ':telephone_portable'=> $_POST['telephone_portable']
  ));
}

 ?>
