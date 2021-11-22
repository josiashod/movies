<?php
    session_start();
    require '../../database/db.php';
    if(isset($_GET['id'])){
        $movies = $bdd->prepare("SELECT* FROM movies WHERE id = ?");
        $movies->execute(array($_GET['id']));
        $movie = $movies->fetch();

        $images = $bdd->query('SELECT* FROM images WHERE type_id = "'.$movie['id'].'" AND type="image"');
        $programs = $bdd->query('SELECT* FROM program WHERE movie = "'.$movie['id'].'"');

        $nbr = $bdd->query('SELECT Count(*) FROM images WHERE type_id = "'.$movie['id'].'" AND type="image"')->fetchColumn(); 

		if(isset($_POST['opinion'])){ 
			$name = htmlspecialchars($_POST['name']);
			$rating = htmlentities($_POST['rating']);
			$content = htmlspecialchars($_POST['content']);
			//var_dump($rating);
			//die();
		
			$insertmbr = $bdd->prepare("INSERT INTO opinions(movie_id,name, rating, content, date) VALUES(?, ?, ?, ?, NOW())");
			$insertmbr->execute(array($_GET['id'],$name,$rating,$content));
			header("Location: $_SERVER[HTTP_REFERER]"); 
		}

		//Partager
		if(isset($_POST['share'])){ 
			$email = htmlspecialchars($_POST['email']);
			$header="MIME-Version: 1.0\r\n";
			$header.='From:"Ciné World"<shrisbys@gmail.com>'."\n";
			$header.='Content-Type:text/html; charset="utf-8"'."\n";
			$header.='Content-Transfer-Encoding: 8bit';
			$message = '
			<html>
			<head>
			<title>ACtivation du compte</title>
			<meta charset="utf-8" />
			</head>
				<body >
				<dir style="text-align: center">
				<h1 align="center">Film : '.$movie['name'].'</h1> 
				<h3 ><b>Disponible sur <i style="color: #343a40">Ciné</i><i style="color: red"> World</i>.</b></h3>
				<p>Cliquer sur ce lien pour plus d\'information: <a href="http://moviesprogramm.great-site.net/views/file/detail.php?id='.$_GET['id'].'">Rejoingnez nous</a></p>
				<p>Nous espérons que <i style="color: #343a40">Ciné</i><i style="color: red"> World</i> comblera vos attente.</p>
				<p>Merci de bien ne pas répondre à ce message.</p>
				</dir>
				</body>
			</html>
			';	
			mail($email, "Nouvelle affiche", $message, $header);

			header("Location: $_SERVER[HTTP_REFERER]");  
		}

		$opinions = $bdd->query('SELECT* FROM opinions WHERE movie_id = "'.$_GET['id'].'" ORDER BY id DESC');
		$count = $bdd->query('SELECT COUNT(*) FROM opinions WHERE movie_id = "'.$_GET['id'].'"')->fetchColumn();
    }

?>

<?php $title = 'Détail films'; ?>

<?php ob_start(); ?>

<div class="hero mv-single-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- <h1> movie listing - list</h1>
				<ul class="breadcumb">
					<li class="active"><a href="#">Home</a></li>
					<li> <span class="ion-ios-arrow-right"></span> movie listing</li>
				</ul> -->
			</div>
		</div>
	</div>
</div>
<div class="page-single movie-single movie_single">
	<div class="container">
		<div class="row ipad-width2">
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="movie-img sticky-sb">
					<img src="image/<?=$movie['image'];?>" alt="">
					<div class="movie-btn">	
						<div class="btn-transform transform-vertical red">
							<div><a href="#" class="item item-1 redbtn"> <i class="ion-play"></i> Voire annonce</a></div>
							<div><a href="#" class="item item-2 redbtn fancybox-media hvr-grow"><i class="ion-play"></i></a></div>
						</div>
						<div class="btn-transform transform-vertical">
							<div><a href="#" class="item item-1 yellowbtn"> <i class="ion-card"></i> Acheter Ticker</a></div>
							<div><a href="#" class="item item-2 yellowbtn"><i class="ion-card"></i></a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="movie-single-ct main-content">
					<h1 class="bd-hd"><?=$movie['name'];?> <span> <?=date("Y",strtotime($movie['date']));?></span></h1>
					<div class="social-btn">
						<div class="hover-bnt">
							<a href="#" class="parent-btn"><i class="ion-android-share-alt"></i>Partager</a>
							<div class="hvr-item">
								<a href="#" class="hvr-grow roomsLink"><i class="ion-social-googleplus"></i></a>
							</div>
						</div>		
					</div>
                    <h1 class="bd-hd"><?=$movie['time'];?></h1>
                        <div class="cate">
                            <span class="orange"><a href="#"><?=$movie['kind'];?></a></span>
                            <?php if($movie['new']) { ?>
                                <span class="yell"><a href="#">Nouveauté</a></span>
                            <?php } ?>
                        </div>
					<div class="movie-tabs">
						<div class="tabs">
							<ul class="tab-links tabs-mv">
								<li class="active"><a href="#resume">Description</a></li>
								<li><a href="#cast">  Programme Cinéma </a></li> 
								<li><a href="#reviews"> Avis</a></li>                      
							</ul>
						    <div class="tab-content">
                                <div id="resume" class="tab active" style="margin-left:5px">
						        	<div class="row">
						        		<div class="rv-hd">
						            		<div>
						            			<h3>Description et photo de</h3>
					       	 					<h2><?=$movie['name'];?></h2>
						            		</div>
						            	</div>
						            	<div class="title-hd-sm">
											<h4>Description</h4>
										</div>
										<div class="mvsingle-item media-item">
                                            <p><?=$movie['resume'];?></p>
										</div>
										<div class="title-hd-sm">
											<h4>Photos <span> (<?=$nbr;?>)</span></h4>
										</div>
										<div class="row">
									        <?php while($image = $images->fetch()) { ?>
											    <a class="img-lightbox col-md-3 col-sm-4 col-xs-6" data-fancybox-group="gallery" href="image/<?=$image['link'];?>" ><img src="image/<?=$image['link'];?>" style="width:200px;height:150px;margin-top:10px" alt=""></a>
                                            <?php }?>
										</div>
						        	</div>
					       	 	</div>
						        <div id="cast" class="tab">
						        	<div class="row">
						            	<h3>Programme cinéma</h3>
					       	 			<h2><?=$movie['name'];?></h2>
										<!-- //== -->
					       	 			<div class="title-hd-sm">
											<h4>Nos programmes</h4>
										</div>
                                        <?php while($program = $programs->fetch()) { ?>
                                            <div class="mvcast-item">											
                                                <div class="cast-it">
                                                    <div class="cast-left">
                                                        <h4>PC</h4>
                                                        <a href="#" style="font-size:20px"><b>Date :</b> <?=date("D d M Y",strtotime($program['date']))?><br> <b>Salle :</b> <?=$program['room'];?> </a>
                                                    </div>
                                                    <p style="font-size:15px ; color:yellow"><b>Heure :</b> <?=$program['time'];?> <br><b>Tarif :</b> <?=$program['rate'];?></p>
                                                </div>
                                            </div>
                                        <?php }?>
										<!-- //== -->
						            </div>
					       	 	</div>
								<div id="reviews" class="tab review">
						           <div class="row">
						            	<div class="rv-hd">
						            		<div class="div">
							            		<h3>Vos avis sur:</h3>
						       	 				<h2><?=$movie['name'];?></h2>
							            	</div>
							            	<a href="#comment" class="redbtn">Write Review</a>
						            	</div>
										<?php while($opinion = $opinions->fetch()) { ?>
											<div class="mv-user-review-item">
												<div class="user-infor">
													<img src="../../publics/images/uploads/user.png" alt="">
													<div>
														<h3><?=$opinion['name'];?></h3>
														<div class="no-star">
														<?php for($i=1 ; $i<=$opinion['rating']; $i++){ ?>
															<i class="fa fa-star"></i>
														<?php }?>
														<?php for($i=1 ; $i<=(5-$opinion['rating']); $i++){ ?>
															<i class="fa fa-star-o"></i>
														<?php }?>
														</div>
														<p class="time">
															<?=date("d M Y",strtotime($movie['date']));?>
														</p>
													</div>
												</div>
												<p><?=$opinion['content'];?></p>
											</div>
										<?php }?>
						            </div>
									<div class="blog-detail-ct">
										<div class="comment-form">
											<h4 id='comment'>Donner votre avis</h4>
											<form action="" method="post">
												<div class="row">
													<div class="col-md-6">
														<input type="text" name="name" placeholder="Nom complet">
													</div>
													<div class="col-md-6">
													<span class="wrap-rating cl11 pointer">
														<i class="item-rating pointer fa fa-star-o"></i>
														<i class="item-rating pointer fa fa-star-o"></i>
														<i class="item-rating pointer fa fa-star-o"></i>
														<i class="item-rating pointer fa fa-star-o"></i>
														<i class="item-rating pointer fa fa-star-o"></i>
														<input class="dis-none" type="hidden" name="rating" required>
													</span>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<textarea name="content" id="" placeholder="Votre avis"></textarea>
													</div>
												</div>
												<input class="submit" name="opinion" type="submit" value="Envoyer">
											</form>
										</div>
										<!-- comment form -->
									</div>
						        </div>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--Partager-->
<div class="login-wrapper" id="room-contentup">
	<div class="login-content">
		<a href="#" class="close">x</a>
		<h3>Partager</h3>
		<form method="post" action="">
			<div class="row">
				<label for="">
					Email
					<input type="email" name="email" id="" placeholder="cine@exemple.com" required="required" style="text-transform: none;"/>
				</label>
			</div>
		<div class="row">
			<button type="submit" name="share"><i class="ion-android-share-alt"></i> Partarger</button>
		</div>
		</form>
	</div>
</div>
<!--Partager-->
<style>
.dis-none{
	display: none;
}

.pointer {
	cursor: pointer;
}

.cl11{
	color: #f9ba48;
	font-size: 25px;
}
</style>

<?php $content = ob_get_clean(); ?>

<?php require('../template.php'); ?>