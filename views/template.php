<?php
    require '../../database/db.php';
    if(isset($_SESSION['id'])){
        $co = $bdd->prepare('SELECT* FROM user WHERE id= ?');
        $co->execute(array($_SESSION['id']));
        $conect = $co->fetch();
    }
    //INSCRIPTION
    if(isset($_POST['save'])){ 
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = sha1($_POST['password']);
        $confirm = sha1($_POST['confirm']);

        $req_email = $bdd->prepare("SELECT* FROM user WHERE email=?");
        $req_email->execute(array($email));
        $email_exist = $req_email->rowCount();
        if($email_exist==0){
            //$pass=sha1($mdp);
            if($password == $confirm){
                $insertmbr = $bdd->prepare("INSERT INTO user(username, email, password) VALUES(?, ?, ?)");
                $insertmbr->execute(array($username,$email, $password));
                header("Location: $_SERVER[HTTP_REFERER]"); 
            }else
            $erreur_pass=" ";
            header("Location: $_SERVER[HTTP_REFERER]");
        }else
            $erreur_email = "Cette adresse email est déjà utilisé ";    
    }

    //CONNEXION
    if(isset($_POST['check'])){ 
        $email = htmlspecialchars($_POST['email']);
        $password = sha1($_POST['password']);
        if(!empty($_POST['email']) AND !empty($_POST['email'])){
            $requser = $bdd->prepare('SELECT* FROM user WHERE email = ? AND password = ?');
            $requser->execute(array($email, $password));
            $userexist = $requser->rowCount();
            if($userexist == 1){
                $userinfo = $requser->fetch();
                $_SESSION['id'] = $userinfo['id'];
                $_SESSION['username'] = $userinfo['username'];
                $_SESSION['email'] = $userinfo['email'];
                $_SESSION['statut'] = $userinfo['statut'];
                header("Location: $_SERVER[HTTP_REFERER]");
            }
            else
                $erreur="";
        }
    }
    //Ajouter TARIF
    if(isset($_POST['rate'])){ 
        $name = htmlspecialchars($_POST['name']);
        $price = htmlspecialchars($_POST['price']);

        $insertmbr = $bdd->prepare("INSERT INTO rates(name, price) VALUES(?, ?)");
        $insertmbr->execute(array($name,$price));
        header("Location: $_SERVER[HTTP_REFERER]");  
    }

    //Ajouter SALLE
    if(isset($_POST['room'])){ 
        $name = htmlspecialchars($_POST['name']);
        $place = htmlspecialchars($_POST['place']);

        $insertmbr = $bdd->prepare("INSERT INTO rooms(name, place) VALUES(?, ?)");
        $insertmbr->execute(array($name,$place));
        header("Location: $_SERVER[HTTP_REFERER]");  
    }
    
    //Filtre de la barre de recherche
    if(isset($_POST['filter'])) {
        $filter = htmlspecialchars($_POST['filter']);
        $search = htmlspecialchars($_POST['search']);
        $result = "home.php?filter=".$_POST['filter']."&search=".$_POST['search'];
        
	    header("Location:".$result);
    }
?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<!-- index14:58-->
<head>
	<!-- Basic need -->
	<title><?= $title ?></title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<link rel="profile" href="#">
    <!--Google Font-->
    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
	<!-- Mobile specific meta -->
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone-no">

	<!-- CSS files -->
	<link rel="stylesheet" href="../../publics/css/plugins.css">
	<link rel="stylesheet" href="../../publics/css/style.css">

</head>
<body>
    <!--preloading-->
    <div id="preloader">
        <img class="logo" src="../../publics/images/cine.png" alt="" width="200" height="58">
        <div id="status">
            <span></span>
            <span></span>
        </div>
    </div>
    <!--end of preloading-->

    <!--alert-->
        <?php if(isset($erreur_email)){?>
            <div style="border: 1px solid transparant; background:rgba(255, 34, 34, 0.308); font-size: 1.2em; color: red;padding: 1%;text-align: center;  ">
            Cette adresse email est déjà utilisé. Reéssayer!!
        </div>
        <?php }?>
        <?php if(isset($erreur_pass)){?>
            <div style="border: 1px solid transparant; background:rgba(255, 34, 34, 0.308); font-size: 1.2em; color: red;padding: 1%;text-align: center;  ">
            Les mots de passe ne sont pas identique. Reéssayer!!
        </div>
        <?php }?>
        <?php if(isset($erreur)){?>
            <div style="border: 1px solid transparant; background:rgba(255, 34, 34, 0.308); font-size: 1.2em; color: red;padding: 1%;text-align: center;  ">
            Email ou mot de passe invalide. Reéssayer!!
        </div>
        <?php }?>
    <!--end alert-->   

    <!--login form popup-->
    <div class="login-wrapper" id="login-content">
        <div class="login-content">
            <a href="#" class="close">x</a>
            <h3>Connexion</h3>
            <form method="post" action="" style="text-transform: none;">
                <div class="row">
                    <label for="">
                        Email:
                        <input type="email" name="email" id="email" placeholder="" required="required" style="text-transform: none;"/>
                    </label>
                </div>
            
                <div class="row">
                    <label for="">
                        Mot de passe:
                        <input type="password" name="password" id="password" placeholder="******"  required="required" style="text-transform: none;"/>
                    </label>
                </div>
            <div class="row">
                <button type="submit" name="check">Se connecter</button>
            </div>
            </form>
        </div>
    </div>
    <!--end of login form popup-->
    <!--signup form popup-->
    <div class="login-wrapper"  id="signup-content">
        <div class="login-content">
            <a href="#" class="close">x</a>
            <h3>Inscrivez-vous</h3>
            <form method="post" action="#">
                <div class="row">
                    <label for="username-2">
                        Nom complet:
                        <input type="text" name="username" id="username-2" placeholder="Hugh Jackman"  required="required" style="text-transform: none;"/>
                    </label>
                </div>
            
                <div class="row">
                    <label for="">
                        Email:
                        <input type="email" name="email" id="" placeholder="" required="required" style="text-transform: none;"/>
                    </label>
                </div>
                <div class="row">
                    <label for="password-2">
                        Mot de passe:
                        <input type="password" name="password" id="password-2" placeholder="" required="required" style="text-transform: none;"/>
                    </label>
                </div>
                <div class="row">
                    <label for="repassword-2">
                        Confirmer mot de passe:
                        <input type="password" name="confirm" id="repassword-2" placeholder="" required="required" style="text-transform: none;"/>
                    </label>
                </div>
            <div class="row">
                <button type="submit" name="save">S'inscrire</button>
            </div>
            </form>
        </div>
    </div>
    <!--end of signup form popup-->
    <!--rate form popup-->
    <div class="login-wrapper" id="rate-content">
        <div class="login-content">
            <a href="#" class="close">x</a>
            <h3>Ajouter un tarif</h3>
            <form method="post" action="" style="text-transform: none;">
                <div class="row">
                    <label for="">
                        Type de tarif:
                        <input type="text" name="name" id="" placeholder="Tarif ......." required="required" style="text-transform: none;"/>
                    </label>
                </div>
            
                <div class="row">
                    <label for="">
                        Prix:
                        <input type="number" name="price" id="password" placeholder="xxxxxx"  required="required" style="text-transform: none;"/>
                    </label>
                </div>
            <div class="row">
                <button type="submit" name="rate">Sauvegarder</button>
            </div>
            </form>
        </div>
    </div>
    <!--end of rate form popup-->


    <!--rate form popup-->
    <div class="login-wrapper" id="room-content">
        <div class="login-content">
            <a href="#" class="close">x</a>
            <h3>Ajouter une salle</h3>
            <form method="post" action="" style="text-transform: none;">
                <div class="row">
                    <label for="">
                        Nom de la salle:
                        <input type="text" name="name" id="" placeholder="" required="required"/>
                    </label>
                </div>
            
                <div class="row">
                    <label for="">
                        Nombre de place
                        <input type="number" name="place" id="password" placeholder="xxxxxx"  required="required"/>
                    </label>
                </div>
            <div class="row">
                <button type="submit" name="room">Sauvegarder</button>
            </div>
            </form>
        </div>
    </div>
    <!--end of rate form popup-->
    <header class="ht-header">
	<div class="container">                    
        <?php include('layouts/header.php'); ?>
	    <!-- top search form -->
		<form action="" method="post">
			<div class="top-search">
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
				<input type="text" placeholder="Rechercher un film" name="search" value="<?php if(isset($search)){echo $search ;}?>">
			</div>
		</form>
	</div>
</header>

    <?= $content ?>

    <?php include('layouts/footer.php'); ?>

    <script src="../../publics/js/jquery.js"></script>
    <script src="../../publics/js/plugins.js"></script>
    <script src="../../publics/js/plugins2.js"></script>
    <script src="../../publics/js/custom.js"></script>
    </body>
</html>
