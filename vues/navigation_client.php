<?php session_start(); ?>
<nav>
	<ul class="nav">
		<li><?php echo $_SESSION['prenom']?> <?php echo $_SESSION['nom']?></li>
		<li class="partie"><a href="vue_tableau_de_bord.php?titre=Tableau de bord">Tableau de bord</a></li>
		<li class="partie"><a href="vue_profil.php?titre=Profil">Profil</a></li>
		<li class="partie"><a href="vue_information.php?titre=Informations">Informations</a></li>
		<li class="partie"><a href="#1">Statistique</a></li>
	</ul>
</nav>