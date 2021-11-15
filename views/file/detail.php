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
						<a href="#" class="parent-btn"><i class="ion-heart"></i>Ajouter au favoris</a>
						<div class="hover-bnt">
							<a href="#" class="parent-btn"><i class="ion-android-share-alt"></i>Partager</a>
							<div class="hvr-item">
								<a href="#" class="hvr-grow"><i class="ion-social-facebook"></i></a>
								<a href="#" class="hvr-grow"><i class="ion-social-twitter"></i></a>
								<a href="#" class="hvr-grow"><i class="ion-social-googleplus"></i></a>
								<a href="#" class="hvr-grow"><i class="ion-social-youtube"></i></a>
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
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('../template.php'); ?>