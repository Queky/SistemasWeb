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
<meta name="description" content="Concesionario">

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
    > Tienda > Vendedor
    </div>

    <div id="centrado">
        <?php
        include 'conexion.php';
        session_start();

        if($_REQUEST!=null)
           {
              $id=$_REQUEST['id'];
              $result= mysqli_query($db,"SELECT `nombre` FROM `modelo` WHERE `id_modelo`=".$id);
              if($row = mysqli_fetch_array($result))
              {
                    echo "<h3>".$row['nombre']."</h3>";
                    echo "<hr size=3 width= 100% align=center>";
              }


               $result = mysqli_query($db,"SELECT color.id_color,color FROM color inner join modelo_color WHERE color.id_color = modelo_color.id_color and modelo_color.id_modelo=".$id);

              echo "<form action='comprarCoche.php' method='post'>
                    <input type='hidden' name='id' value=".$id.">
                    <br><h3>Color</h3>";

              while($row = mysqli_fetch_array($result))
              {

                     echo  "<input type='radio' name='color' value='".$row['id_color']."' required>".$row['color'];
                     echo "<br>";


              }
              echo "<br><br><hr size=3 width= 100% align=center>";

              $result = mysqli_query($db,"SELECT motor.id_motor,tipo FROM motor inner join modelo_motor WHERE motor.id_motor = modelo_motor.id_motor and modelo_motor.id_modelo=".$id);
              echo "<h3>Motor</h3>";
              while($row = mysqli_fetch_array($result))
              {


                   echo  "<input type='radio' name='motor' value='".$row['id_motor']."' required>".$row['tipo'];
                  echo "<br>";
              }
              echo "<br><br><hr size=3 width= 100% align=center>";

              $result = mysqli_query($db,"SELECT extra.id_extra,tipo FROM extra inner join modelo_extra WHERE extra.id_extra = modelo_extra.id_extra and modelo_extra.id_modelo=".$id);
              echo "<h3>Extras</h3>";

              while($row = mysqli_fetch_array($result))
              {
                   echo  "<input type='radio' name='extra' value='".$row['id_extra']."' required>".$row['tipo'];
                   echo "<br>";

              }
              echo "<br><br><hr size=3 width= 100% align=center>";


              echo "<br><button class='opcion' type='submit'>Comprar</button></form>" ;
              mysqli_close($db);


            }

        ?>
        </div>
</body>

</body>
