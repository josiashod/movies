<?php
session_start();
require '../../database/db.php';
if(isset($_SESSION['id'])){
    $co = $bdd->prepare('SELECT* FROM user WHERE id= ?');
    $co->execute(array($_SESSION['id']));
    $conect = $co->fetch();

	if(isset($_POST['username']) && !empty($_POST['username']) && $_POST['username']!= $conect['username']){
		$username = htmlspecialchars($_POST['username']);
		$insertusername = $bdd->prepare("UPDATE user SET username = ? WHERE id = ?");
		$insertusername->execute(array($username, $_SESSION['id']));
        header("Location: $_SERVER[HTTP_REFERER]"); 
	}

	if(isset($_POST['email']) && !empty($_POST['email']) && $_POST['email']!= $conect['email']){
		$email = htmlspecialchars($_POST['email']);
		$insertemail = $bdd->prepare("UPDATE user SET email = ? WHERE id = ?");
		$insertemail->execute(array($email, $_SESSION['id']));
        header("Location: $_SERVER[HTTP_REFERER]"); 
	}

	if(isset($_POST['old']) && isset($_POST['password']) && isset($_POST['confirm'])){
		$old= sha1($_POST['old']);
		$password= sha1($_POST['password']);
		$confirm= sha1($_POST['confirm']);
		if($old == $conect['password'] ){
			if($password == $confirm){
				$insertpassword = $bdd->prepare("UPDATE user SET password = ? WHERE id = ?");
				$insertpassword->execute(array($password, $_SESSION['id']));
				$sucess = "Mot de passe réinisialisé avec succès!";
			}else
				$erreur1 = "Les mot de passe doivent être identique!";
		}else
			$erreur2 = "Revoie votre ancien mot de passe";

		
	}
}
?>

<?php $title = 'Mon profil'; ?>

<?php ob_start(); ?>
<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Edward kennedy’s profile</h1>
					<ul class="breadcumb">
						<li class="active"><a href="#">Accueil</a></li>
						<li> <span class="ion-ios-arrow-right"></span>Profile</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-single">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="user-information">
					<div class="user-img">
						<a href="#"><img src="../../publics/images/uploads/user.png" alt="" style="border-radius:110px;width:70%"><br></a>
						<span style="color:white; font-weight:600; font-size:20px"> <?=$conect['username'];?></span><br>
                        <div class="cate">
							<?php if($conect['statut']) { ?>
								<span class="orange"><a href="#">Administrateur</a></span>
							<?php }else{ ?>
								<span class="blue"><a href="#">utilisateur</a></span>
							<?php } ?>
						</div>
					</div>
					<div class="user-fav">
						<p>Account Details</p>
						<ul>
							<li  class="active"><a href="userprofile.html">Profile</a></li>
							<li><a href="#change">Changer mot de passe</a></li>
							<li><a href="deconnect.php">Deconnexion</a></li>
					</div>
				</div>
			</div>
			<div class="col-md-9 col-sm-12 col-xs-12">
				<div class="form-style-1 user-pro" action="#">

					<?php if(isset($erreur1)){?>
						<div style="border: 1px solid transparant; background:rgba(255, 34, 34, 0.308); font-size: 1.2em; color: red;padding: 1%;text-align: center;  ">
							<?=$erreur1;?>	
						</div>
					<?php }?>
					<?php if(isset($erreur2)){?>
						<div style="border: 1px solid transparant; background:rgba(255, 34, 34, 0.308); font-size: 1.2em; color: red;padding: 1%;text-align: center;  ">
							<?=$erreur2;?>
						</div>
					<?php }?>
					<?php if(isset($sucess)){?>
                        <div style="border: 1px solid transparant; background: rgba(76, 207, 23, 0.397);; margin: 0% 25% 0% 25%; font-size: 1.2em; color: gray;padding: 1%;text-align: center;  ">
                            <?=$sucess;?>
                         </div>
                    <?php }?>

					<form action=""  method="post" class="user">
						<h4>01. Détails profils</h4>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Nom complet</label>
								<input type="text" value="<?=$conect['username'];?>" name="username" required>
							</div>
							<div class="col-md-6 form-it">
								<label>Email Address</label>
								<input type="text" value="<?=$conect['email'];?>" nmae="email" required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<input class="submit" type="submit" value="Enregistrer">
							</div>
						</div>	
					</form>
					<form action="" class="password" method="post">
						<h4 id="change">02. Changer mot de passe</h4>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Ancien mot de passe</label>
								<input type="text" placeholder="**********" name="old" required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Nouveau mot de passe</label>
								<input type="text" placeholder="***************" name="password" required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Confirmer mot de passe</label>
								<input type="text" placeholder="*************** " name="confirm" required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<input class="submit" type="submit" value="Changer">
							</div>
						</div>	
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('../template.php'); ?>