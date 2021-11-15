<?php
session_start();
	require '../../database/db.php';
    if(isset($_POST['contact'])){ 
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = $_POST['message'];

        $insertmbr = $bdd->prepare("INSERT INTO contacts(name,email,message,date) VALUES(?,?,?,NOW())");
        $insertmbr->execute(array($name,$email,$message));
        $sucess="Message envoyé avec succès"; 
    }
?>

<?php $title = 'Contact'; ?>

<?php ob_start(); ?>

<div class="hero common-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Contact</h1>
                    <?php if(isset($sucess)){?>
                        <div style="border: 1px solid transparant; background: rgba(76, 207, 23, 0.397);; margin: 0% 25% 0% 25%; font-size: 1.2em; color: green;padding: 1%;text-align: center;  ">
                            <?=$sucess;?>
                         </div>
                    <?php }?>
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
                    <div class="comment-form">
                        <h4>Aviez-vous des inquiétudes, n'hesitez pas à nous contacter.</h4>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" placeholder="Votre nom" name="name" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" placeholder="Votre email" name="email" required>
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea name="message" id="" placeholder="Message" required></textarea>
                                </div>
                            </div>
                            <input class="submit" type="submit" name="contact" value="Envoyer">
                        </form>
                    </div>  
                </div>
			</div>
		</div>
	</div>
</div>
<!-- end of  blog detail section-->

<?php $content = ob_get_clean(); ?>

<?php require('../template.php'); ?>