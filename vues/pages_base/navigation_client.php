<nav> <!-- affiche le menu de navigation -->
	<ul class="nav">
		<li><?php echo $_SESSION['prenom']?> <?php echo $_SESSION['nom']?></li>
		<li class="partie"><a href="index.php?action=tableau_bord">Tableau de bord</a></li>
		<li class="partie"><a href="index.php?action=profil">Profil</a></li>
		<li class="partie"><a href="index.php?action=information">Informations</a></li>
		<li class="partie"><a href="#1">Statistique</a></li>
	</ul>
</nav>
