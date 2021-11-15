<?php
session_start();
require '../../database/db.php';
if(!$_SESSION['statut'])header("Location: home.php");
if(isset($_SESSION['id'])){
    $co = $bdd->prepare('SELECT* FROM user WHERE id= ?');
    $co->execute(array($_SESSION['id']));
    $conect = $co->fetch();
}
?>

<?php $title = 'Gestion des membres'; ?>

<?php ob_start(); ?>

<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Gestion des membres</h1>
				</div>
			</div>
		</div>
        <div class="row">
			<a class="col-md-6 sub" href="list_user.php">
				<div class="">
					<h3>Listes des utlisateurs</h3>
				</div>
            </a>
            <a class="col-md-6 sub" href="message.php">
				<div class="">
					<h3>Messages</h3>
				</div>
            </a>
		</div>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php include_once('../template.php'); ?>