<?php $titre = "Connexion"; ?>

<?php ob_start(); ?>

			<div id="page_co">
				<h1>Connexion</h1>
				<form method="post" action="index.php?action=verif_connexion">
					<p>
						<label for="email">E-mail :</label><br/>
						<input type="text" name="email" id="email"  size="30"/>
					</p>
					<p>
						<label for="pass">Mot de passe :</label><br/>
						<input type="password" name="pass" id="pass" size="30"/>
					</p>
	    			<input type="submit" value="Valider"/>
				</form>
			</div>
			<a href="index.php?action=inscription" id="inscription">Inscription</a>

			<?php include("ppage.php"); ?>

<?php $content = ob_get_clean(); ?>
<?php require('vues/base.php'); ?>
