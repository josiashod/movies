<?php
    session_start();
    require '../../database/db.php';
    $events = $bdd->query('SELECT* FROM events ORDER BY id DESC');
	$exist = $events->rowCount();

?>

<?php $title = 'Evènements'; ?>

<?php ob_start(); ?>

<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Evènements</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-single">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
			<?php if($exist != 0) { ?>
				<div class="row">
                    <?php while($event = $events->fetch()) { ?>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="blog-item-style-2">
							<a href="detail_events.php?id=<?=$event['id'];?>"><img src="image/<?=$event['image'];?>" style="width:300px;height:150px" alt=""></a>
                                <div class="blog-it-infor">
                                    <h3><a href="detail_events.php?id=<?=$event['id'];?>"><?=$event['title'];?></a></h3>
                                    <span class="time"><?=date("d M Y",strtotime($event['date']))?></span>
                                    <p><?=substr($event['content'],0,80).'...';?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
				</div>
			<?php } else{ ?>
				<h2	style="color: white; text-align:center">Aucun Evènement</h2>
			<?php } ?>	
			</div>
		
		</div>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('../template.php'); ?>