<?php
session_start();
require '../../database/db.php';
    //Films trouvés
    $found = $bdd->query('SELECT COUNT(*) FROM movies')->fetchColumn();
    $movies = $bdd->query('SELECT* FROM movies ORDER BY id DESC');
    //Nombre total de films
    $all = $bdd->query('SELECT COUNT(*) FROM movies')->fetchColumn();
    
    //Traitement des données pour le filtre
    if(isset($_GET['filter']) || isset($_GET['search'])) {
        $filter = htmlspecialchars($_GET['filter']);
        $search = htmlspecialchars($_GET['search']);
        //var_dump($filter);
        //die();
        $movies = $bdd->query('SELECT * FROM movies WHERE CONCAT(name) LIKE "%'.$search.'%" AND kind="'.$filter.'"  ORDER BY id DESC');
        $found = $bdd->query('SELECT COUNT(*) FROM movies WHERE CONCAT(name) LIKE "%'.$search.'%" AND kind="'.$filter.'" ORDER BY id DESC')->fetchColumn();
    }
    $news = $bdd->query('SELECT* FROM movies WHERE new=1 ORDER BY id DESC');
    $exist = $movies->rowCount();
    $er = $_GET['er'];
    if($er == "Erreur")
        $erreur_log = "aa";
    
?>
<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>

<?php if(isset($erreur_log)){?>
    <div style="border: 1px solid transparant; background:rgba(255, 34, 34, 0.308); font-size: 1.2em; color: red;padding: 1%;text-align: center;  ">
        Veuillez vous connectez pour avec un accès administrateur pour accéder à l'espace privé.
    </div>
<?php }?>


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
                                        <a href="#" class="parent-btn"><i class="ion-play"></i> Bande d'annonce</a>
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
                                    <div class="mv-details">
                                        <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                        <ul class="mv-infor">
                                            <li>  Durée: 2h21’ </li>
                                            <li>  Rated: PG-13  </li>
                                            <li>  Date de sortie: 1 Mai 2015</li>
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
                                    <h1><a href="#">broolyn<span>2017</span></a></h1>
                                    <div class="social-btn">
                                        <a href="#" class="parent-btn"><i class="ion-play"></i> Bande d'annonce</a>
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
                                    <div class="mv-details">
                                        <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                        <ul class="mv-infor">
                                            <li>  Durée: 1h30’ </li>
                                            <li>  Rated: PG-13  </li>
                                            <li>  Date de sortie: 29 Juin 2015</li>
                                        </ul>
                                    </div>		
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="mv-img-2">
                                    <a href="#"><img src="../../publics/images/uploads/series-img.jpg" alt="" style="width:75%"></a>
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
                                    <h1><a href="#">the king's<br>man<span>2021</span></a></h1>
                                    <div class="social-btn">
                                        <a href="#" class="parent-btn"><i class="ion-play"></i> Bande d'annonce</a>
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
                                    <div class="mv-details">
                                        <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                        <ul class="mv-infor">
                                            <li>  Durée: 02h11 </li>
                                            <li>  Rated: PG-13  </li>
                                            <li>  Date de sortie: 21 Décembre 2021</li>
                                        </ul>
                                    </div>		
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="mv-img-2">
                                    <a href="#"><img src="../../publics/images/uploads/Kings-Man.jpg" alt="" style="width:75%"></a>
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
                    <div class="title-hd">
                        <h2>Nouveauté</h2>
                    </div>
                    <div>
                        <div class="tab-content">
                            <div id="tab1-h2" class="tab active">             
                                <?php if($exist != 0) { ?>
                                    <div class="flex-wrap-movielist mv-grid-fw">
                                        <?php while($new = $news->fetch()) {?>
                                            <div class="movie-item-style-2 movie-item-style-1">
                                                <img src="image/<?=$new['image'];?>" alt="" style="width:200px;height:250px">
                                                <div class="hvr-inner">
                                                    <a href="detail.php?id=<?=$new['id'];?>">Voir plus <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="mv-item-infor">
                                                    <div class="cate" style="font-size:0.7em">
                                                        <span class="orange"><a href="#"><?=$new['kind'];?></a></span>
                                                        <?php if($new['new']) { ?>
                                                            <span class="blue"><a href="#">NEW</a></span>
                                                        <?php } ?>
                                                    </div>
                                                    <h6><a href="#"><?=$new['name'];?></a></h6>
                                                </div>
                                            </div>
                                        <?php }?>	
                                    </div>	
                                    
                                    	
                                <?php } else{ ?>
                                    <h2	style="color: white; text-align:center">Aucun film trouvé</h2>
                                <?php } ?>	
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">  
                    <form action="" method="get">
                        <div class="topbar-filter fw">
                            <p>Trouvé <span><?=number_format($found);?> films </span>sur <?=number_format($all);?> aux totals</p>
                                <label>Trier par:</label>
                                <select name="filter" required>
                                    <option value="">Tout</option>
                                    <option <?php if(isset($filter) && $filter =="divertissement"){?> selected <?php }?> value="divertissement">Divertissement</option>
                                    <option <?php if(isset($filter) && $filter =="action"){?> selected <?php }?> value="action">Action</option>
                                    <option <?php if(isset($filter) && $filter =="suspens"){?> selected <?php }?> value="suspens">Suspens</option>
                                    <option <?php if(isset($filter) && $filter =="policier"){?> selected <?php }?> value="policier">Policier</option>
                                    <option <?php if(isset($filter) && $filter =="fantastique"){?> selected <?php }?> value="fantastique">Fantastique</option>
                                    <option <?php if(isset($filter) && $filter =="sci_fi"){?> selected <?php }?> value="sci_fi">Science-fiction</option>
                                    <option <?php if(isset($filter) && $filter =="drame"){?> selected <?php }?> value="drame">Drame</option>
                                    <option <?php if(isset($filter) && $filter =="comedie"){?> selected <?php }?> value="comedie">Comédie</option>
                                    <option <?php if(isset($filter) && $filter =="enfant"){?> selected <?php }?> value="enfant">Enfant</option>
                                </select>
                                <input type="hidden" value=" " name="search">
                                <button type="submit" class="list" ><i class="ion-ios-search "></i></button>
                        </div>
                    </form>
                    <?php if($exist != 0) { ?>
                        <div class="flex-wrap-movielist mv-grid-fw">
                            <?php while($movie = $movies->fetch()) {
                                $date=$movie['date'];
                                if($movie['new'] && date('Y-m-d')>date('Y-m-d',strtotime("$date,1 month"))){
                                    $insertmovie = $bdd->prepare("UPDATE movies SET new = ? WHERE id = ?");
                                    $insertmovie->execute(array(false, $movie['id']));
                                }
                                ?>
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
                    <?php } else{ ?>
					    <h2	style="color: white; text-align:center">Aucun film trouvé</h2>
				    <?php } ?>	
                </div>
            </div>
        </div>
    </div>
  

<?php $content = ob_get_clean(); ?>

<?php require('../template.php'); ?>