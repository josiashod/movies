<?php
session_start();
require '../../database/db.php';
if(!$_SESSION['statut'])header("Location: home.php"); 
//Add events
if(isset($_POST['events'])){ 
	$title = htmlspecialchars($_POST['title']);
	$type = htmlspecialchars($_POST['type']);
	$content = $_POST['content'];

	if ($_FILES['image']['size'] <= 1000000){
          $infosfichier = pathinfo($_FILES['image']['name']);
          $extension_upload = $infosfichier['extension'];
          $extensions_autorisees = array('jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF','png', 'PNG','jfif');
          if (in_array($extension_upload,$extensions_autorisees) OR array($extension_upload,$extensions_autorisees)){
				// On peut valider le fichier et le stocker définitivement
				move_uploaded_file($_FILES['image']['tmp_name'], 'image/' .
				basename($_FILES['image']['name']));
				$image=$_FILES['image']['name'];
		  }
	}
	$insertevents = $bdd->prepare("INSERT INTO events(title, type, content, image) VALUES(?, ?, ?, ?)");
	$insertevents->execute(array($title,$type,$content,$image));

	$img = $bdd->query('SELECT COUNT(*) FROM events');
	$imgid = $img->fetchColumn();


	$countfiles = count($_FILES['images']['name']);

	for($i=0;$i<$countfiles;$i++){
		if ($_FILES['images']['size'][$i] <= 1000000){
			$infosfichier = pathinfo($_FILES['images']['name'][$i]);
			$extension_upload = $infosfichier['extension'];
			$extensions_autorisees = array('jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF','png', 'PNG','jfif');
			if (in_array($extension_upload,$extensions_autorisees) OR array($extension_upload,$extensions_autorisees)){
				// On peut valider le fichier et le stocker définitivement
				move_uploaded_file($_FILES['images']['tmp_name'][$i], 'image/' .
				basename($_FILES['images']['name'][$i]));
				$images=$_FILES['images']['name'][$i];
				$type_id=$imgid;
				$type="event";
				$insertimg = $bdd->prepare("INSERT INTO images(link, type_id, type) VALUES(?, ?, ?)");
				$insertimg->execute(array($images,$type_id,$type));
			}
		}
		 
	}
	header("Location: events.php");
}
?>

<?php $title = 'Ajouter un évènement'; ?>

<?php ob_start(); ?>

<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Ajouter un évènement</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-single">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="form-style-1 user-pro" action="">
					<form action="" class="user" method="post" enctype="multipart/form-data">
						<h4>Informations sur l'évènement</h4>
						<div class="row">
							<div class="col-md-12 form-it">
								<label>Titre Evènement</label>
								<input type="text" placeholder="Nom fu film" name="title" required>
							</div>
							<div class="col-md-12 form-it">
								<label>Type d'évènement</label>
								<select name="type" required>
									<option>--- Choisir ---</option>
									<option value="avant-premeres">Avant-premières</option>
									<option value="soirees thematiques">Soirées thématiques</option>
									<option value="euro">Cinéma Européens</option>
									<option value="afri">Cinéma Africains</option>
                                </select>
							</div>
                            <div class="col-md-12 form-it">
								<label>Image principale</label>
								<input type="file" placeholder="" name="image"  style="width:100%" required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 form-it">
								<label>Contenu</label>
								<textarea  name="content" placeholder="Bref description du film" style="height:120px;color: #abb7c4;background-color: #233a50; border: none;" required></textarea>
							</div>
							<div class="col-md-12 form-it">
								<label>Quelques images de l'évènement</label>
								<input type="file" placeholder="" name="images[]"  style="width:100%" multiple required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<input class="submit" type="submit" name="events" value="Enregistrer">
							</div>
						</div>	
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('../template.php'); ?>