<?php
    session_start();
    require '../../database/db.php';
    if(isset($_GET['room'])){
        $rooms = $bdd->prepare("SELECT* FROM rooms WHERE id = ?");
        $rooms->execute(array($_GET['room']));
        $room = $rooms->fetch();
        $insertrooms = $bdd->prepare("UPDATE rooms SET del = ? WHERE id = ?");
        $insertrooms->execute(array(true, $room['id']));
        header("Location: $_SERVER[HTTP_REFERER]"); 
    } 
    
    if(isset($_GET['rate'])){
        $rates = $bdd->prepare("SELECT* FROM rates WHERE id = ?");
        $rates->execute(array($_GET['rate']));
        $rate = $rates->fetch();
        $insertrates = $bdd->prepare("UPDATE rates SET del = ? WHERE id = ?");
        $insertrates->execute(array(true, $rate['id']));
        header("Location: $_SERVER[HTTP_REFERER]"); 
    }

    
?>