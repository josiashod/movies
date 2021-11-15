<?php
session_start();
	require '../../database/db.php';
	if(isset($_GET['id'])){
		$events = $bdd->prepare("SELECT* FROM events WHERE id = ?");
		$events->execute(array($_GET['id']));
		$event = $events->fetch();

		$images = $bdd->query('SELECT* FROM images WHERE type_id = "'.$event['id'].'" AND type="event"');

		$nbr = $bdd->query('SELECT Count(*) FROM images WHERE type_id = "'.$event['id'].'" AND type="image"')->fetchColumn(); 
	}


?>

<?php $title = 'Détail de l\'évènements'; ?>

<?php ob_start(); ?>

<div class="hero common-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1> Evènement Detail</h1>
					<ul class="breadcumb">
						<li class="active"><a href="home.php">Home</a></li>
						<li> <span class="ion-ios-arrow-right"></span> Evènement</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- blog detail section-->
<div class="page-single">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-sm-12 col-xs-12">
				<div class="blog-detail-ct">
					<h1><?=$event['title'];?></h1>
					<h4 class="sb-title" style="color:red"><?=date("d M Y",strtotime($event['date']))?></h4>
					<img src="image/<?=$event['image'];?>" alt="">
					<p style="text-align:justify">
					 	<?=$event['content'];?>
					</p>
					<div class="row">
						<?php while($image = $images->fetch()) { ?>
							<a class="img-lightbox col-md-3 col-sm-4 col-xs-6" data-fancybox-group="gallery" href="image/<?=$image['link'];?>" ><img src="image/<?=$image['link'];?>" style="width:200px;height:150px" alt=""></a>
						<?php }?>
					</div>
					<!-- share link -->
					<div class="flex-it share-tag">
						<div class="social-link">
							<h4>Share it</h4>
							<a href="#"><i class="ion-social-facebook"></i></a>
							<a href="#"><i class="ion-social-twitter"></i></a>
							<a href="#"><i class="ion-social-googleplus"></i></a>
							<a href="#"><i class="ion-social-pinterest"></i></a>
							<a href="#"><i class="ion-social-linkedin"></i></a>
						</div>
						<div class="right-it">
							<h4>Tags</h4>
							<a href="#">Gray,</a>
							<a href="#">Film,</a>
							<a href="#">Poster</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end of  blog detail section-->

<?php $content = ob_get_clean(); ?>

<?php require('../template.php'); ?>