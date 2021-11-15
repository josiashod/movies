<?php
session_start();
	require '../../database/db.php';
    if(!$_SESSION['statut'])header("Location: home.php");
    $contacts = $bdd->query('SELECT* FROM contacts ORDER BY id DESC');

?>

<?php $title = 'Messages'; ?>

<?php ob_start(); ?>

<div class="hero common-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Messages reçus</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- blog detail section-->
<div class="page-single">
	<div class="container">
		<div class="row">
            <?php while($contact = $contacts->fetch()) { ?>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="blog-item-style-1 blog-item-style-3">
                        <img src="../../publics/images/uploads/user.png" style="width:40%" alt="">
                        <div class="blog-it-infor">
                            <h3><a href="#"><?=$contact['name'];?></a></h3>
                            <div class="cate">
                                <span class="orange"><a href="#"  style="text-transform:none"> <?=$contact['email'];?></a></span>
                            </div>
                            <span class="time"><?=date("d M Y",strtotime($contact['date']))?></span>
                            <p><?=$contact['message'];?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
		</div>
	</div>
</div>
<!-- end of  blog detail section-->

<?php $content = ob_get_clean(); ?>

<?php require('../template.php'); ?>