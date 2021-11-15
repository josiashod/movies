<?php
session_start();
require '../../database/db.php';
if(!$_SESSION['statut'])header("Location: home.php");
//Add movies
if(isset($_POST['movies'])){ 
	$name = htmlspecialchars($_POST['name']);
	$kind = htmlspecialchars($_POST['kind']);
	$new = htmlspecialchars($_POST['new']);
	$date = htmlspecialchars($_POST['date']);
	$time = htmlspecialchars($_POST['time']);
	$resume = htmlspecialchars($_POST['resume']);
	

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
	$insertmovies = $bdd->prepare("INSERT INTO movies(name, kind, new, date, time, resume, image) VALUES(?, ?, ?, ?, ?, ?, ?)");
	$insertmovies->execute(array($name,$kind,$new,$date,$time,$resume,$image));

	$img = $bdd->query('SELECT COUNT(*) FROM movies');
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
				$type="image";
				$insertimg = $bdd->prepare("INSERT INTO images(link, type_id, type) VALUES(?, ?, ?)");
				$insertimg->execute(array($images,$type_id,$type));
			}
		}
		 
	}
	header("Location: home.php");
}
?>

<?php $title = 'Ajouter un film'; ?>

<?php ob_start(); ?>

<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Ajouter un film</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-single">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="form-style-1 user-pro" action="#">
					<form action="" class="user" method="post" enctype="multipart/form-data">
						<h4>Informations sur le film</h4>
						<div class="row">
							<div class="col-md-4 form-it">
								<label>Nom du film</label>
								<input type="text" placeholder="Nom fu film" name="name" required>
							</div>
							<div class="col-md-4 form-it">
								<label>Type</label>
								<select name="kind" required>
									<option>--- Choisir un type de film---</option>
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
							</div>
							<div class="col-md-4 form-it">
								<label>Nouveauté</label>
								<select name="new" required>
									<option>--- Choisir---</option>
									<option value="1">Oui</option>
									<option value="0">Non</option>
                                </select>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 form-it">
								<label>Date de sortie</label>
								<input type="date" placeholder="" name="date" required>
							</div>
							<div class="col-md-4 form-it">
								<label>Durée</label>
								<input type="time" placeholder="" name="time" required>
							</div>
							<div class="col-md-4 form-it">
								<label>Image principale</label>
								<input type="file" placeholder="" name="image"  style="width:100%" required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 form-it">
								<label>Résume</label>
								<textarea  name="resume" placeholder="Bref description du film" style="height:120px;color: #abb7c4;background-color: #233a50; border: none;" required></textarea>
							</div>
							<div class="col-md-12 form-it">
								<label>Quelques images du film</label>
								<input type="file" placeholder="" name="images[]"  style="width:100%" multiple required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<input class="submit" type="submit" name="movies" value="Enregistrer">
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