<?php
    session_start();
    require '../../database/db.php';
	if(!$_SESSION['statut'])header("Location: home.php");
    $users = $bdd->query("SELECT* FROM user ORDER BY id DESC");
    $found = $bdd->query('SELECT COUNT(*) FROM user')->fetchColumn();
?>

<?php $title = 'Listes des utilisateurs'; ?>

<?php ob_start(); ?>

<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Listes des utilisateurs</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-single">
	<div class="container">
		<div class="row ipad-width2">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="topbar-filter">
					<p class="pad-change">Trouvés <span><?=number_format($found);?> utilisateurs</span> au total</p>
				</div>
				<div class="row">
                <?php while($user = $users->fetch()) { ?>
                    <div class="col-md-4">
						<div class="ceb-item-style-2">
							<img src="../../publics/images/uploads/user.png" alt="" style="width: 100px; height:80px">
							<div class="ceb-infor">
								<h2><a href="#"><?=$user['username'];?></a></h2>
                                <p style="font-size:0.8em; font-weight:700"><b>Email:</b><?=$user['email'];?></p>
                                <div class="cate">
                                    <?php if($user['statut']) { ?>
                                        <span class="orange"><a href="#">Administrateur</a></span>
                                    <?php }else{ ?>
                                        <span class="blue"><a href="#">utilisateur</a></span>
                                    <?php } ?>
                                </div>
							</div>
						</div>
					</div>
                <?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('../template.php'); ?>