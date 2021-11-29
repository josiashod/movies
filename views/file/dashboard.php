<?php
session_start();
require '../../database/db.php';
if(!$_SESSION['statut']){
    $er = "Erreur";
    header("Location: home.php?er=" . $er);}
if(isset($_SESSION['id'])){
    $co = $bdd->prepare('SELECT* FROM user WHERE id= ?');
    $co->execute(array($_SESSION['id']));
    $conect = $co->fetch();
}
?>

<?php $title = 'Dashboard'; ?>

<?php ob_start(); ?>
<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Dashboard</h1>
				</div>
			</div>
		</div><br>
        <div class="row">
			<a class="col-md-4 sub" href="movies.php">
				<div class="">
					<h3>Gestion des films</h3>
				</div>
            </a>
            <a class="col-md-4 sub" href="members.php">
				<div class="">
					<h3>Gestion des membres</h3>
				</div>
            </a>
            <a class="col-md-4 sub" href="add_events.php">
				<div class="">
					<h3>Ajouter Evènement</h3>
				</div>
            </a>
		</div>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php include_once('../template.php'); ?>