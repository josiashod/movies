<?php
	session_start();
	require '../../database/db.php';
	if(!$_SESSION['statut'])header("Location: home.php");
	//movies
    $mov = $bdd->query('SELECT * FROM movies ORDER BY id DESC');
	//room
    $roo = $bdd->query('SELECT * FROM rooms ORDER BY id DESC');
	//rate
    $rat = $bdd->query('SELECT * FROM rates ORDER BY id DESC');

	//SALLE
    if(isset($_POST['program'])){ 
		$date = htmlspecialchars($_POST['date']);
		$time = htmlspecialchars($_POST['time']);
		$room = htmlspecialchars($_POST['room']);
		$rate = htmlspecialchars($_POST['rate']);
        $movie = htmlspecialchars($_POST['movie']);
		$week = date('Y-m-W',strtotime($_POST['date']));

		$req= $bdd->prepare("SELECT* FROM movies WHERE date=? AND time=? AND room=?");
        $req->execute(array($date,$time,$room));
        $exist = $req->rowCount();
		if($exist == 0){
			$insertmbr = $bdd->prepare("INSERT INTO program(movie, date, time, room, rate,week) VALUES(?, ?, ?, ?, ?,?)");
			$insertmbr->execute(array($movie,$date,$time,$room,$rate,$week));
			header('Location: after.php'); 
		}else
			$erreur="Ce film est déjà programmer au même horaire";
    }

?>

<?php $title = 'Programmer un film'; ?>

<?php ob_start(); ?>

<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Programmer un film</h1>
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
						<h4>Programmation d'un film au cinéma</h4>
						<div class="row">
							<div class="col-md-12 form-it">
								<label>Nom du Film</label>
								<select name="movie" required>
									<option>--- Choisir film---</option>
									<?php while($movie = $mov->fetch()) { ?>
										<option value="<?=$movie['id'];?>"><?=$movie['name'];?> (<?=$movie['kind'];?>)</option>
									<?php }?>
									
                                </select>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Date de sortie</label>
								<input type="date" placeholder="" name="date" required>
							</div>
							<div class="col-md-6 form-it">
								<label>Durée</label>
								<input type="time" placeholder="" name="time" required>
							</div>
						</div>
						<div class="row">
                            <div class="col-md-6 form-it">
								<label>Tarif</label>
								<select name="rate" required>
									<option>--- Choisir---</option>
									<?php while($rate = $rat->fetch()) { ?>
										<option value="<?=$rate['name'];?> - <?=$rate['price'];?>"><?=$rate['name'];?> (<?=$rate['price'];?>)</option>
									<?php } ?>
                                </select>
							</div>
							<div class="col-md-6 form-it">
								<label>Salle</label>
								<select name="room" required>
									<option>--- Choisir---</option>
									<?php while($room = $roo->fetch()) { ?>
										<option value="<?=$room['name'];?> - <?=$room['place'];?>"><?=$room['name'];?> (<?=$room['place'];?>)</option>
									<?php } ?>
                                </select>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<input class="submit" type="submit" name="program" value="Enregistrer">
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