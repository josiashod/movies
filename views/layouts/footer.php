<?php
	//newsletter
	if(isset($_POST['news'])){ 
		$email = htmlspecialchars($_POST['email']);

		$insertmbr = $bdd->prepare("INSERT INTO newsletters(email) VALUES(?)");
		$insertmbr->execute(array($email));
		header("Location: $_SERVER[HTTP_REFERER]");  
	}
?>
<footer class="ht-footer">
	<div class="container">
		<div class="flex-parent-ft">
			<div class="flex-child-ft item1">
				 <a href="index-2.html"><img class="logo" src="images/logo1.png" alt=""></a>
				 <p>Afrique Bénin<br>
				Cotonou, BC 10001</p>
				<p>Contactez-nous: <a href="#">(+229) 97 01 01 01</a></p>
			</div>
			<div class="flex-child-ft item2">
				<h4>Pages</h4>
				<ul>
					<li><a href="home.php">A l'affiche</a></li> 
					<li><a href="after.php">Prochainement</a></li>
					<li><a href="contact.php">Contact</a></li>
					<li><a href="info.php">Informations</a></li>
					<li><a href="events.php">Evènements</a></li>
					<li><a href="#">Aide</a></li>
				</ul>
			</div>
			<div class="flex-child-ft item3">
				<h4>Politique</h4>
				<ul>
					<li><a href="#">Terme d'utilisation</a></li> 
					<li><a href="#">Politique</a></li>	
					<li><a href="#">Sécurité</a></li>
				</ul>
			</div>
			<
			<div class="flex-child-ft item5">
				<h4>Newsletter</h4>
				<p>Souscrire à la newsletter et <br>obtient les derniers informations.</p>
				<form action="" method="post">
					<input type="text" name="email" placeholder="Entrer email..." required>	
					<button  type="submit" class="btn" name="news" >Souscrire</button>
				</form>
			</div>
		</div>
	</div>
	<div class="ft-copyright">
		<div class="ft-left">
			<p><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>
		</div>
		<div class="backtotop">
			<p><a href="#" id="back-to-top">Back to top  <i class="ion-ios-arrow-thin-up"></i></a></p>
		</div>
	</div>
</footer>