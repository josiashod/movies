<?php
	session_start();
	require '../../database/db.php';
	if(!$_SESSION['statut'])header("Location: home.php");
	//movies
    $mov = $bdd->query('SELECT* FROM movies ORDER BY id DESC');
	//room
    $roo = $bdd->query('SELECT* FROM rooms WHERE del=0 ORDER BY id DESC');
	//rate
    $rat = $bdd->query('SELECT* FROM rates WHERE del=0 ORDER BY id DESC');

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

			//envoyerr mail
			$last = $bdd->query('SELECT * FROM program ORDER BY id DESC LIMIT 0,1')->fetch();
			$mov = $bdd->query('SELECT * FROM movies WHERE id="'.$last['movie'].'" ORDER BY id DESC LIMIT 0,1')->fetch();
			$req_news = $bdd->query("SELECT* FROM newsletters");
			$news_exist = $req_news->rowCount();
			if($news_exist!=0){
				while($new = $req_news->fetch()){
					$header="MIME-Version: 1.0\r\n";
					$header.='From:"Ciné World"<shrisbys@gmail.com>'."\n";
					$header.='Content-Type:text/html; charset="utf-8"'."\n";
					$header.='Content-Transfer-Encoding: 8bit';
					$message = '
					<html>
					<head>
					<title>ACtivation du compte</title>
					<meta charset="utf-8" />
					</head>
						<body >
						<dir style="text-align: center">
						<h1 align="center">Film : '.$mov['name'].'</h1> 
						<h3 ><b>programmé le '.date("d M Y",strtotime($last['date'])).' à '.$last['time'].' sur <i style="color: #343a40">Ciné</i><i style="color: red"> World</i>.</b></h3>
						<p>Cliquer sur ce lien pour plus d\'information: <a href="http://moviesprogramm.great-site.net/views/file/after.php">Rejoingnez nous</a></p>
						<p>Nous espérons que <i style="color: #343a40">Ciné</i><i style="color: red"> World</i> comblera vos attente.</p>
						<p>Merci de bien ne pas répondre à ce message.</p>
						</dir>
						</body>
					</html>';
					mail($new['email'], "Nouvelle Actualité", $message, $header);
				}
			}

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
								<label>Date de programmation</label>
								<input type="date" placeholder="" name="date" required>
							</div>
							<div class="col-md-6 form-it">
								<label>Heure de programation</label>
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