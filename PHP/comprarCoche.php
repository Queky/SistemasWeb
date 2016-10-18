<?php
	$id_modelo=$_POST["id"];
	$id_color=$_POST["color"];
	$id_motor=$_POST["motor"];
	$id_extra=$_POST["extra"];

  	include 'conexion.php';
  	session_start();

	try {  
	  $result = mysqli_query($db,"INSERT INTO ventas (id_venta, fecha, id_modelo, id_color, id_motor, id_extra) VALUES (NULL, CURRENT_DATE(), ".$id_modelo.",".$id_color.",".$id_motor.",".$id_extra.")");
	  header ("Location:ventas.html");

	} catch (Exception $e) {
 		 $db->rollBack();
 		 echo "Fallo: " . $e->getMessage();
	}	
?>