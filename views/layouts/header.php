
<nav class="navbar navbar-default navbar-custom">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header logo">
			<div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<div id="nav-icon1">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
			<a href="home.php"><img class="logo" src="../../publics/images/cine.png" alt="" width="200" ></a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav flex-child-menu menu-left">
				<li class="hidden">
					<a href="#page-top"></a>
				</li>
				<li class="">
					<a class="btn btn-default dropdown-toggle lv1" href="home.php">
					A l'Affiche
					</a>
				</li>
				<li class="">
					<a class="btn btn-default dropdown-toggle lv1" href="after.php">
					Prochainement
					</a>
				</li>
				<li class="dropdown first">
					<a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
					Actualités <i class="fa fa-angle-down" aria-hidden="true"></i>
					</a>
					<ul class="dropdown-menu level1">
						<li><a href="events_afri.php">Cinéma Africain</a></li>
						<li><a href="events_euro.php">Cinéma Européen</a></li>
						<li><a href="events.php">News</a></li>
					</ul>
				</li>
				<li class="dropdown first">
					<a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
					A propos <i class="fa fa-angle-down" aria-hidden="true"></i>
					</a>
					<ul class="dropdown-menu level1">
						<li><a href="info.php">Informations divers</a></li>
						<li><a href="contact.php">Nous contacter</a></li>
					</ul>
				</li>
				<?php if(isset($conect['id']) && $conect['statut']){ ?>
					<li class="dropdown first">
					<a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
					Administration<i class="fa fa-angle-down" aria-hidden="true"></i>
					</a>
					<ul class="dropdown-menu level1">
						<li><a href="movies.php">Gestion des films</a></li>
						<li><a href="members.php">Gestion des membres</a></li>	
						<li><a href="add_events.php">Ajouter Evènement</a></li>
					</ul>
				</li>
				<?php }?>
			</ul>
			<?php if(isset($_SESSION['id'])){ ?>
				<ul class="nav navbar-nav flex-child-menu menu-right">
					<li class=""><a href="profil.php">Profile</a></li>
					<li class="btn "><a href="deconnect.php">Deconnexion</a></li>
				</ul>
			<?php }else{ ?>
				<ul class="nav navbar-nav flex-child-menu menu-right">
					<li class="loginLink"><a href="#">Connecter</a></li>
					<li class="btn signupLink"><a href="#">Inscrire</a></li>
				</ul>
			<?php }?>
		</div>
	<!-- /.navbar-collapse -->
</nav>