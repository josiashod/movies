<?php
session_start();
	require '../../database/db.php';
    //Afficher les films de la semaine prochaine
    $programs0 = $bdd->query('SELECT* FROM program WHERE week>"'.date("Y-m-W").'" AND week<="'.date("Y-m-W", strtotime("1 week")).'" ORDER BY id DESC'); 
    $exist0 = $programs0->rowCount();
    //var_dump(date("Y-m-W", strtotime("$da")));
    //die();
    //Afficher les films de la semaine actuelle
    $programs = $bdd->query('SELECT* FROM program WHERE week="'.date('Y-m-W').'" ORDER BY id DESC');
    $exist1 = $programs->rowCount();
    //Afficher les films de la semaine passée
    $programs2 = $bdd->query('SELECT* FROM program WHERE week<"'.date("Y-m-W").'" AND week>="'.date("Y-m-W", strtotime("-1 week")).'" ORDER BY id DESC'); 
    $exist2 = $programs2->rowCount();
?>

<?php $title = 'Prochainement'; ?>

<?php ob_start(); ?>

<div class="hero common-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Prochainement</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="movie-items  full-width">
	<div class="row">
		<div class="col-md-12">
        <div class="title-hd">
				<h2>Semaine prochaine</h2>
			</div>
			<div class="tabs">
			    <div class="tab-content">
			        <div id="tab1-h2" class="tab active">             
                        <?php if($exist0 != 0) { ?>
                            <div class="row">
                                <div class="slick-multiItem2">
                                    <?php 
                                        while($program = $programs0->fetch()) { 
                                        $movies = $bdd->query('SELECT* FROM movies WHERE id="'.$program['movie'].'"');
                                        $movie = $movies->fetch();
                                        ?>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="image/<?=$movie['image'];?>" alt="" style="width:200px;height:250px">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a  href="detail.php?id=<?=$movie['id'];?>">Plus <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <div class="cate" style="font-size:0.7em">
                                                        <?php if($movie['new']) { ?>
                                                            <span class="green"><a href="#">NEW</a></span>
                                                        <?php } ?>
                                                        <span class="orange"><a href="#"><?=$movie['kind'];?></a></span>
                                                    </div>
                                                    <h6><a href="#"><?=$movie['name'];?></a></h6>
                                                    <p style="color:#f5b50a;font-weight:700"><?=date("d M Y",strtotime($program['date']))?> - <?=$program['time'];?></p>
                                                </div>
                                            </div>
                                            <div class="cate" style="margin-left:5%">
                                                <span class="blue"><a href="#"><?=$program['rate'];?></a></span>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } else{ ?>
                            <h3	style="color: yellow; text-align:center">Aucune programmation pour le moment</h3>
                        <?php } ?>
			        </div>
			    </div>
			</div>

			<div class="title-hd">
				<h2>Cette semaine</h2>
			</div>
			<div class="tabs">
			    <div class="tab-content">
			        <div id="tab1-h2" class="tab active">             
                        <?php if($exist1 != 0) { ?>
                            <div class="row">
                                <div class="slick-multiItem2">
                                    <?php 
                                        while($program = $programs->fetch()) { 
                                        $movies = $bdd->query('SELECT* FROM movies WHERE id="'.$program['movie'].'"');
                                        $movie = $movies->fetch();
                                        ?>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="image/<?=$movie['image'];?>" alt="" style="width:200px;height:250px">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a  href="detail.php?id=<?=$movie['id'];?>">Plus <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <div class="cate" style="font-size:0.7em">
                                                        <?php if($movie['new']) { ?>
                                                            <span class="green"><a href="#">NEW</a></span>
                                                        <?php } ?>
                                                        <span class="orange"><a href="#"><?=$movie['kind'];?></a></span>
                                                    </div>
                                                    <h6><a href="#"><?=$movie['name'];?></a></h6>
                                                    <p style="color:#f5b50a;font-weight:700"><?=date("d M Y",strtotime($program['date']))?> - <?=$program['time'];?></p>
                                                </div>
                                            </div>
                                            <div class="cate" style="margin-left:5%">
                                                <span class="blue"><a href="#"><?=$program['rate'];?></a></span>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } else{ ?>
                            <h3	style="color: yellow; text-align:center">Aucune programmation pour le moment</h3>
                        <?php } ?>
			        </div>
			    </div>
			</div>

			<div class="title-hd">
				<h2>Semaine passé</h2>
			</div>
			<div class="tabs">
			    <div class="tab-content">
			        <div id="tab21-h2" class="tab active">
                        <?php if($exist2 != 0) { ?>
                            <div class="row">
                                <div class="slick-multiItem2">
                                    <?php 
                                        while($program = $programs2->fetch()) { 
                                        $movies = $bdd->query('SELECT* FROM movies WHERE id="'.$program['movie'].'"');
                                        $movie = $movies->fetch();
                                        ?>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="image/<?=$movie['image'];?>" alt="" style="width:200px;height:250px">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a  href="detail.php?id=<?=$movie['id'];?>">Plus <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <div class="cate" style="font-size:0.7em">
                                                        <?php if($movie['new']) { ?>
                                                            <span class="green"><a href="#">NEW</a></span>
                                                        <?php } ?>
                                                        <span class="orange"><a href="#"><?=$movie['kind'];?></a></span>
                                                    </div>
                                                    <h6><a href="#"><?=$movie['name'];?></a></h6>
                                                    <p style="color:#f5b50a;font-weight:700"><?=date("d M Y",strtotime($program['date']))?> - <?=$program['time'];?></p>
                                                </div>
                                            </div>
                                            <div class="cate" style="margin-left:5%">
                                                <span class="blue"><a href="#"><?=$program['rate'];?></a></span>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } else{ ?>
                            <h3	style="color: yellow; text-align:center">Vide</h3>
                        <?php } ?>
			        </div>
			    </div>
			</div>
		</div>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('../template.php'); ?>