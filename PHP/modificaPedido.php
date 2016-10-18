
<?php
	$id_modelo=$_POST["id"];
	$id_color=$_POST["color"];
	$id_motor=$_POST["motor"];
	$id_extra=$_POST["extra"];
	
  	include 'conexion.php';
  	session_start();

	try {  
	  $result = mysqli_query($db,"UPDATE ventas SET  id_color = ".$id_color." , id_motor = ".$id_motor." , id_extra =".$id_extra." WHERE id_venta =  ".$id_venta);

	  header ("Location:ventas.html");

	} catch (Exception $e) {
  		$db->rollBack();
  		echo "Fallo: " . $e->getMessage();
}
	
?>