<?php
	  	include 'conexion.php';
	 	session_start();
	  	$modelo=$_POST["modelo"];

	  	$result = mysqli_query($db,"INSERT INTO modelo (id_modelo,nombre) VALUES (NULL,'".$modelo."')");

	  	$id  = $db->insert_id;
	  	echo $id;
	 	$color=$_POST["color"];
	  		for($i=0; $i< count($color); $i++){
	  			$sqlc = "INSERT INTO modelo_color (id_modelo,id_color) VALUES (".$id.",'".$color[$i]."')";	  		
	  			$resultc = mysqli_query($db,$sqlc);	
	  		}


	  	$motor=$_POST["motor"];	
	  	for($i=0; $i< count($motor); $i++){
	  			$sqlmo = "INSERT INTO modelo_motor (id_modelo,id_motor) VALUES (".$id.",'".$motor[$i]."')";
	  		  	$resultmo = mysqli_query($db,$sqlmo);
	  		}

	  	$extra=$_POST["extra"];
	  		for($i=0; $i< count($extra); $i++){
	  			$sqlex = "INSERT INTO modelo_extra (id_modelo,id_extra) VALUES (".$id.",".$extra[$i].")";
	  			$resultex = mysqli_query($db,$sqlex);	
	  		}

	    header ("Location:cocheCreado.html");

?>