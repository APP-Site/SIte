<?php $titre = "Première inscription"; ?>

<?php ob_start(); ?>

    	<div id="page_verif">
    		<p>	<h1>Verification du code</h1>
    			Si c'est votre première connection veuillez récuperer le code fourni lors de votre premier achat pour vous inscrire
    		</p>
      		<form method="post" action="index.php?action=verif_code">
      			<p>
      				<label for="email">E-mail :</label><br>
      				<input type="text" name="email"   size="30" />
      			</p>
      			<p>
      				<label for="code">Code :</label><br>
      				<input type="text" name="code"  size="30" />
       			</p>
          			<input type="submit" value="Valider"/>
    		</form>
    	</div>

    	<?php include("ppage.php"); ?>

<?php $content = ob_get_clean(); ?>
<?php require('vues/base.php'); ?>
