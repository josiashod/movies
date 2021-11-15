<?php
session_start();
	require '../../database/db.php';

?>

<?php $title = 'Informations divers'; ?>

<?php ob_start(); ?>

<div class="hero common-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1> Informations divers</h1>
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
				
			</div>
		</div>
	</div>
</div>
<!-- end of  blog detail section-->

<?php $content = ob_get_clean(); ?>

<?php require('../template.php'); ?>