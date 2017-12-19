<! DOCTYPE html>

<?php
    $req = $bdd->query('SELECT * FROM sujet_forum, utilisateur WHERE sujet_forum.code = utilisateur.code ORDER BY date_sujet_forum DESC LIMIT 0, 5');
?>
        <html>
        <div class="news">
        	<table>
        			<tr>
        				<th>Sujet</th>
        				<th>Createur</th>
        				<th>Date</th>
        			</tr>
        			<?php while ($donnees = $req->fetch())
                    {?>
                    <tr>
                        <td><a href="vue_forum_topic.php?topic=<?php echo $donnees['id_sujet_forum']; ?>&titre=Sujet"><?php echo htmlspecialchars($donnees['titre_sujet_forum']); ?></a></td>
                        <td><?php echo $donnees['prenom']; ?> <?php echo $donnees['nom']; ?></td>
                        <td><?php echo $donnees['date_sujet_forum']; ?></td>
        			</tr>
        			<?php }?>
        	</table>
        </div>
        </html> 
