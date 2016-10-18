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
    > Tienda > Nuevo Pedido
    </div>


    <p align="center"> Para realizar un pedido seleccione el modelo que desea y despues sus caracteristicas dentro de las disponibles</p>
    <div id="tienda">
      <h3 align="center">Modelos disponibles</h3>
      <hr size=3 width= 100%% align=center>
      <ul>
        <?php
          include 'conexion.php';
          session_start();
          $result = mysqli_query($db,"SELECT * FROM modelo");
          while($row = mysqli_fetch_array($result))
            {
            	   echo  "<br><li><a href='vendedor.php?id=".$row['id_modelo']."'>".$row['nombre']."</a></li><br>";
            }
        ?>
      </ul>
      <hr size=3 width= 100%% align=center>

  <div id="espacio"></div>
  </div>
</body>
</html>
