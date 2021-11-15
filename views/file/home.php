<?php
session_start();
require '../../database/db.php';
    //all
    $found = $bdd->query('SELECT COUNT(*) FROM movies')->fetchColumn();
    $movies = $bdd->query('SELECT* FROM movies ORDER BY id DESC');
    //count
    $all = $bdd->query('SELECT COUNT(*) FROM movies')->fetchColumn();
    //filter
    if(isset($_GET['filter']) || isset($_GET['search'])) {
        $filter = htmlspecialchars($_GET['filter']);
        $search = htmlspecialchars($_GET['search']);
        //var_dump($filter);
        //die();
        $movies = $bdd->query('SELECT * FROM movies WHERE CONCAT(name) LIKE "%'.$search.'%" AND kind="'.$filter.'"  ORDER BY id DESC');
        $found = $bdd->query('SELECT COUNT(*) FROM movies WHERE CONCAT(name) LIKE "%'.$search.'%" AND kind="'.$filter.'" ORDER BY id DESC')->fetchColumn();
    }
    
?>
<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>

    <div class="slider sliderv2">
        <div class="container">
            <div class="row">
                <div class="slider-single-item">
                    <div class="movie-item">
                        <div class="row">
                            <div class="col-md-8 col-sm-12 col-xs-12">
                                <div class="title-in">
                                    <div class="cate">
                                        <span class="blue"><a href="#">Sci-fi</a></span>
                                        <span class="yell"><a href="#">Action</a></span>
                                        <span class="orange"><a href="#">advanture</a></span>
                                    </div>
                                    <h1><a href="#">guardians of the<br>
                                    galaxy <span>2015</span></a></h1>
                                    <div class="social-btn">
                                        <a href="#" class="parent-btn"><i class="ion-play"></i> Watch Trailer</a>
                                        <a href="#" class="parent-btn"><i class="ion-heart"></i> Add to Favorite</a>
                                        <div class="hover-bnt">
                                            <a href="#" class="parent-btn"><i class="ion-android-share-alt"></i>share</a>
                                            <div class="hvr-item">
                                                <a href="#" class="hvr-grow"><i class="ion-social-facebook"></i></a>
                                                <a href="#" class="hvr-grow"><i class="ion-social-twitter"></i></a>
                                                <a href="#" class="hvr-grow"><i class="ion-social-googleplus"></i></a>
                                                <a href="#" class="hvr-grow"><i class="ion-social-youtube"></i></a>
                                            </div>
                                        </div>		
                                    </div>
                                    <div class="mv-details">
                                        <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                        <ul class="mv-infor">
                                            <li>  Run Time: 2h21’ </li>
                                            <li>  Rated: PG-13  </li>
                                            <li>  Release: 1 May 2015</li>
                                        </ul>
                                    </div>		
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="mv-img-2">
                                    <a href="#"><img src="../../publics/images/uploads/poster1.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>	
                    </div>
                    <div class="movie-item">
                        <div class="row">
                            <div class="col-md-8 col-sm-12 col-xs-12">
                                <div class="title-in">
                                    <div class="cate">
                                        <span class="blue"><a href="#">Sci-fi</a></span>
                                        <span class="yell"><a href="#">Action</a></span>
                                        <span class="orange"><a href="#">advanture</a></span>
                                    </div>
                                    <h1><a href="#">guardians of the<br>
                                    galaxy <span>2015</span></a></h1>
                                    <div class="social-btn">
                                        <a href="#" class="parent-btn"><i class="ion-play"></i> Watch Trailer</a>
                                        <a href="#" class="parent-btn"><i class="ion-heart"></i> Add to Favorite</a>
                                        <div class="hover-bnt">
                                            <a href="#" class="parent-btn"><i class="ion-android-share-alt"></i>share</a>
                                            <div class="hvr-item">
                                                <a href="#" class="hvr-grow"><i class="ion-social-facebook"></i></a>
                                                <a href="#" class="hvr-grow"><i class="ion-social-twitter"></i></a>
                                                <a href="#" class="hvr-grow"><i class="ion-social-googleplus"></i></a>
                                                <a href="#" class="hvr-grow"><i class="ion-social-youtube"></i></a>
                                            </div>
                                        </div>		
                                    </div>
                                    <div class="mv-details">
                                        <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                        <ul class="mv-infor">
                                            <li>  Run Time: 2h21’ </li>
                                            <li>  Rated: PG-13  </li>
                                            <li>  Release: 1 May 2015</li>
                                        </ul>
                                    </div>
                                   
                                    
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="mv-img-2">
                                    <a href="#"><img src="../../publics/images/uploads/poster1.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>	
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">  
                    <form action="" method="get">
                        <div class="topbar-filter fw">
                            <p>Trouvé <span><?=number_format($found);?> films </span>sur <?=number_format($all);?> aux totals</p>
                                <label>Trier par:</label>
                                <select name="filter">
                                    <option value="">Tous</option>
									<option value="divertissement">Divertissement</option>
									<option value="action">Action</option>
									<option value="suspens">Suspens</option>
									<option value="policier">Policier</option>
									<option value="fantastique">Fantastique</option>
									<option value="sci_fi">Science-fiction</option>
									<option value="drame">Drame</option>
									<option value="comedie">Comédie</option>
									<option value="enfant">Enfant</option>
                                </select>
                                <input type="hidden" value=" " name="search">
                                <button type="submit" class="list" ><i class="ion-ios-search "></i></button>
                        </div>
                    </form>
                    <div class="flex-wrap-movielist mv-grid-fw">
                        <?php while($movie = $movies->fetch()) { ?>
                            <div class="movie-item-style-2 movie-item-style-1">
                                <img src="image/<?=$movie['image'];?>" alt="" style="width:200px;height:250px">
                                <div class="hvr-inner">
                                    <a href="detail.php?id=<?=$movie['id'];?>">Voir plus <i class="ion-android-arrow-dropright"></i> </a>
                                </div>
                                <div class="mv-item-infor">
                                    <div class="cate" style="font-size:0.7em">
                                        <span class="orange"><a href="#"><?=$movie['kind'];?></a></span>
                                        <?php if($movie['new']) { ?>
                                            <span class="blue"><a href="#">NEW</a></span>
                                        <?php } ?>
                                    </div>
                                    <h6><a href="#"><?=$movie['name'];?></a></h6>
                                </div>
                            </div>
						<?php }?>				
                            
                            
                    </div>		
                    
                </div>
            </div>
        </div>
    </div>
  

<?php $content = ob_get_clean(); ?>

<?php require('../template.php'); ?>