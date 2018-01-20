<section class="notification">
<!--Cette section, notification sera une partie de notre page qui suivra le déroulement de la page elle doit être
visible pour l'utilisateur et contient les notifications et alertes possibles concernant l'utilisateur en question
une barre de recherche-->
	<form method="post" action="traitement.php">
        <input type="text" name="recherche" class="recherche" placeholder="Recherche">
	</form>

	<div class="boutique"><a href="#1">Boutique</a></div>
	<div class="noti">Actualité :</div>
	<div class="alerte" style="font-size: small;">
		<table>
			<tr>
				<th>Titre des sujets</th>
			</tr>
			<?php $actus = actualite();
			while ($actu = $actus -> fetch()) { ?>
				<tr>
					<td><a href="index.php?action=actualite&id=<?= $actu['id_sujet'] ?>"><?= $actu['titre_sujet'] ?></a></td>
				<?php } ?>
			</table>
		</div>
	</section>
