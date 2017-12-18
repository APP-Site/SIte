<header class="hpage"> 
	<div class="hpage_gauche">
		<img src="image/logo.PNG" id="logo" alt="logo" height="50%" width="100%"><br/>
        <span>Produit de DomISEP</span>
	</div>
	
	<?php 
	   $titre = $_GET['titre'];
	?>
                    
	<h1><strong><?php echo $titre ;?></strong></h1>
                   
	<div class="barre_info">
	<ul>
      	<li class="lien"><a href="#1">Contacts</a></li>
       	<li class="lien"><a href="#1">Aides</a></li>
    	<li class="lien"><a href="vue_page_forum.php?titre=Forum">Forum</a></li>
	</ul>
	<a href="../controleurs/controleur_deconnexion.php">Deconnexion</a>
	</div>
</header>