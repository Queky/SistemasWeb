<!DOCTYPE html>
 <html lang="es">
<!-- El head del documento con la informacion principal de la Web -->
<head>
<title>Concesionario</title>
<meta charset="utf-8" />

<!-- Cargamos Css -->
<link rel="stylesheet" href="css/style.css" />

<!-- Cargamos fuente desde servidor google -->
<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>

<!-- Palabras clave y descripcion -->
<meta name="keywords" content="concesionario">
<meta name="description" content="Concesionario de coches">

</head>
<body>
  <div id="content">
  <header>
    <h1><span class="mayus">S</span>istemas <span class="mayus">W</span>eb</h1>
    <ul id="top">
      <li><a href="index.php">Inicio</a></li>
      <li><a href="ventas.html">Volver</a></li>
    </ul>
    <hr size=3 width= 100%% align=center>
  </header>
    <div id="navegador" >
    > Tienda > Modificar Pedido
    </div>
      <div id="tienda">
          	<table>
          		<tr>
          			<td>ID del pedido &nbsp; </td>
          			<td>Fecha&nbsp;</td>
          			<td>Color&nbsp;</td>
          			<td>Motor&nbsp;</td>
          			<td>Extra&nbsp;</td>
          		</tr>
          		<tr>
          			<td>
          			<?php

              		include 'conexion.php';
              		session_start();
              	  $result = mysqli_query($db,"SELECT * from ventas order by `id_venta`");

                	while($row = mysqli_fetch_array($result))
                  	{

                        echo "</td></tr><tr><td><a href='cambioPedido.php?id_venta=".$row['id_venta']."' >".$row['id_venta']."</a></td><td>".$row['fecha']."</td>";

                        $modelo = $row['id_modelo'];
                        $idmodelo = intval($modelo);
                        $result1 = mysqli_query($db,"SELECT * FROM modelo WHERE id_modelo = ".$idmodelo);

                        	while($rowmod = mysqli_fetch_array($result1))
                        	{
                        		$cadena = "<input type='hidden' name='modelo' value = '".$rowmod['id_modelo']."' required";
                        			if($modelo == $rowmod['id_modelo'])
                        				$cadena.="cheked='true'";
                        			$cadena.=">".$rowmod['nombre']."</input>";
                        	}

                       	$color = $row['id_color'];
                        $idcolor = intval($color);
                        $result2 = mysqli_query($db,"SELECT * FROM color WHERE id_color = ".$idcolor);

                        	while($rowcol = mysqli_fetch_array($result2))
                        	{
                        		$cadena2 = "<input type='hidden' name='modelo' value = '".$rowcol['id_color']."' required";
                        			if($color == $rowcol['id_color'])
                        				$cadena2.="cheked='true'";
                        			$cadena2.=">".$rowcol['color']."</input>";
                        	}

                       	echo "<td>".$cadena2."</td>";


                       	$motor = $row['id_motor'];
                        $idmotor = intval($motor);
                        $result3 = mysqli_query($db,"SELECT * FROM motor WHERE id_motor = ".$idmotor);

                        	while($rowmot = mysqli_fetch_array($result3))
                        	{
                        		$cadena3 = "<input type='hidden' name='modelo' value = '".$rowmot['id_motor']."' required";
                        			if($motor == $rowmot['id_motor'])
                        				$cadena3.="cheked='true'";
                        			$cadena3.=">".$rowmot['tipo']."</input>";
                        	}

                       	echo "<td>".$cadena3."</td>";


                       	$extra = $row['id_extra'];
                        $idextra = intval($extra);
                        $result4 = mysqli_query($db,"SELECT * FROM extra WHERE id_extra = ".$idextra);

                        	while($rowex = mysqli_fetch_array($result4))
                        	{
                        		$cadena4 = "<input type='hidden' name='modelo' value = '".$rowex['id_extra']."' required";
                        			if($extra == $rowex['id_extra'])
                        				$cadena4.="cheked='true'";
                        			$cadena4.=">".$rowex['tipo']."</input>";
                        	}

                       	echo "<td>".$cadena4."</td></tr>";

                  	}
                  	mysqli_close($db);
                ?>
          	</table>
            </div>
  </body>
</html>
