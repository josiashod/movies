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

<?php $title = 'Gestion des films'; ?>

<?php ob_start(); ?>

<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Gestion des films</h1>
				</div>
			</div>
		</div><br>
        <div class="row">
			<a class="col-md-3 sub rateLink" href="#">
				<div class="">
					<h3>Ajouter un tarif</h3>
				</div>
            </a>
            <a class="col-md-3 sub roomLink" href="#">
				<div class="">
					<h3>Ajouter une salle</h3>
				</div>
            </a>
            <a class="col-md-3 sub" href="add_movies.php">
				<div class="">
					<h3>Ajouter un film</h3>
				</div>
            </a>
            <a class="col-md-3 sub" href="cinema_movies.php">
				<div class="">
					<h3>Programmer un film</h3>
				</div>
            </a>
		</div>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php include_once('../template.php'); ?>