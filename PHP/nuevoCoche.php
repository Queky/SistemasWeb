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
      <li><a href="fabrica.html">Volver</a></li>
    </ul>
    <hr size=3 width= 100%% align=center>
  </header>
    <div id="navegador" >
    > Fabrica > Crea nuevo coche
    </div>

      <span id="principal">
        </div>
          </div>
            <div id="principal" >
            <?php

                include 'conexion.php';
                session_start();



            echo "<form action='fabricar.php' method='post'><br><br><br>
                  <h3>Nombre del modelo:</H2>
                  <input type='text' name='modelo' required>";

                 echo "<br><br><br><h3>Colores disponibles</h3>";

                 $sqlc = "SELECT * FROM color";
                 $resultc = mysqli_query($db,$sqlc);
                 while ($rowc = mysqli_fetch_array($resultc)){

                 	echo "<br><input type='checkbox' name= 'color[]' value =' ".$rowc['id_color']."'>".$rowc['color'];

                 }

                  echo "<br><br><br><h3>Motores disponibles</h3>";

                 $sqlm = "SELECT * FROM motor";
                 $resultm = mysqli_query($db,$sqlm);
                 while ($rowm = mysqli_fetch_array($resultm)){
                 	echo "<br><input type='checkbox' name= 'motor[]'  value =' ".$rowm['id_motor']."'>".$rowm['tipo'];
                 }

                  echo "<br><br><br><h3>Extras disponibles</h3>";

                 $sqlll = "SELECT * FROM extra";
                 $resultll = mysqli_query($db,$sqlll);
                 while ($rowll = mysqli_fetch_array($resultll)){
                 	echo "<br><input type='checkbox' name= 'extra[]' value =' ".$rowll['id_extra']."'>".$rowll['tipo'];
                 }


                 echo "<br><br><br><button class='opcion' type='submit'>Crear</button>
                    	</form>";



            	mysqli_close($db);



            ?>
            </div>
            </span>
</body>
</html>
