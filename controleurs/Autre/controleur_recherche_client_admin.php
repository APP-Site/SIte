<?php

 include("../modele/modele_admin.php"); ?>
<h3>Information client</h3>
  <ul>
    <li>Nom: <?php echo $client['nom'];?> <?php echo $client['prenom'];?></li>
    <li>Adresse: <?php echo $client['adresse'];?> <?php echo $client['code_postal']?> <?php echo $client['ville']?></li>
    <li>Telephone: <?php echo $client['telephone_portable'];?></li>
    <li>E-mail: <?php echo $client['email'];?></li>
  </ul>
