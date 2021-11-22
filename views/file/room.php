<?php
    session_start();
    require '../../database/db.php';
    if(!$_SESSION['statut'])header("Location: home.php");
    $rooms = $bdd->query('SELECT* FROM rooms WHERE del=0 ORDER BY id DESC');
?>

<?php $title = 'Gestion des films'; ?>

<?php ob_start(); ?>

<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
                <a class="col-md-3 sub roomLink" style="left:32%" href="#">
                    <div class="">
                        <h3>Ajouter une salle</h3>
                    </div>
                </a>
				</div>
			</div>
		</div><br>
	</div>
</div>

<div class="page-single">
    <div class="container">  
        <div class="row">
            <table style="color:white;border:3px solid gray;">
                <thead>
                    <tr>
                        <th class="col-md-1">N°</th>
                        <th>Salle</th>
                        <th>Place</th>
                        <th class="col-md-2"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($room = $rooms->fetch()) {?>
                        <tr>
                            <th><?=$room['id'];?></th>
                            <th><?=$room['name'];?></th>
                            <th><?=$room['place'];?></th>
                            <th>
                                <a class="delete" href="delete.php?room=<?=$room['id'];?>"><i class="fa fa-trash"></i> Supprimer</a>                       
                            </th>
                                
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div>
    </div>
</div>


<style>
th{
    border:1px solid gray;
    text-align:center;
}

.delete{
    background:red;
    color:white;
    padding:5px;
    border-radius: 5px;
    margin-left:10%
}

.delete:hover{
    color:black;
}

</style>
  

<?php $content = ob_get_clean(); ?>

<?php include_once('../template.php'); ?>