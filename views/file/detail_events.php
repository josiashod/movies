<?php
session_start();
	require '../../database/db.php';
	if(isset($_GET['id'])){
		$events = $bdd->prepare("SELECT* FROM events WHERE id = ?");
		$events->execute(array($_GET['id']));
		$event = $events->fetch();

		$images = $bdd->query('SELECT* FROM images WHERE type_id = "'.$event['id'].'" AND type="event"');

		$nbr = $bdd->query('SELECT Count(*) FROM images WHERE type_id = "'.$event['id'].'" AND type="image"')->fetchColumn(); 

		if(isset($_POST['comment'])){ 
			$name = htmlspecialchars($_POST['name']);
			$message = htmlspecialchars($_POST['message']);
		
			$insertmbr = $bdd->prepare("INSERT INTO comments(event_id,name, message, date) VALUES(?, ?, ?, NOW())");
			$insertmbr->execute(array($_GET['id'],$name,$message));
			header("Location: $_SERVER[HTTP_REFERER]");  
		}

		$comments = $bdd->query('SELECT* FROM comments WHERE event_id = "'.$_GET['id'].'" ORDER BY id DESC');
		$count = $bdd->query('SELECT COUNT(*) FROM comments WHERE event_id = "'.$_GET['id'].'"')->fetchColumn();
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
					<!-- comment items -->
					<div class="comments">
						<h4><?=$count;?> Commentaires</h4>
						<?php while($comment = $comments->fetch()) { ?>
							<div class="cmt-item flex-it">
								<img src="../../publics/images/uploads/user.png" style="width:80px;border-radius:50px" alt="">
								<div class="author-infor">
									<div class="flex-it2">
										<h6><a href="#"><?=$comment['name'];?></a></h6> <span class="time"> - <?=date("d M Y",strtotime($comment['date']))?></span>
									</div>
									<p><?=$comment['message'];?></p>
									<p><a class="rep-btn" href="#comment">+ Commenter</a></p>
								</div>
							</div>
						<?php }?>
					</div>
					<div class="comment-form">
						<h4 id='comment'>Faire un commentaire</h4>
						<form action="" method="post">
							<div class="row">
								<div class="col-md-12">
									<input type="text" name="name" placeholder="Nom complet">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<textarea name="message" id="" placeholder="Message"></textarea>
								</div>
							</div>
							<input class="submit" name="comment" type="submit" value="Envoyer">
						</form>
					</div>
					<!-- comment form -->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end of  blog detail section-->

<?php $content = ob_get_clean(); ?>

<?php require('../template.php'); ?>