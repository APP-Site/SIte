<?php
$req = $bdd->query('SELECT id_sujet_forum, titre_sujet_forum, DATE_FORMAT(date_sujet_forum, \'%d/%m/%Y à %Hh%imin%ss\') AS date_sujet_forum, contenu_sujet_forum FROM sujet_forum ORDER BY date_sujet_forum DESC LIMIT 0, 5');
while ($donnees = $req->fetch())
?>
