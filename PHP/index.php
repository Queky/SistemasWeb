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
			<li><a class="actual" href="index.php">Inicio</a></li>
		</ul>
		<hr size=3 width= 100%% align=center>
	</header>
		<div id="navegador" >
		> Concesionario
		</div>

			<span id="principal">
				<?php

					function verificar_login($user,$password,&$result)
				    {

				    	include 'conexion.php';
				    	session_start();
				        $sql = "SELECT * FROM usuarios WHERE usuario='$user' and password='$password'";
				        $rec = mysqli_query($db, $sql);
				        $count = 0;
				        while($row = mysqli_fetch_object($rec))
				        {
				            $count++;
				            $result = $row;
				        }
				        if($count == 1)
				        {
				            return 1;
				        }
				        else
				        {
				            return 0;
				        }
				    }
				    if(!isset($_SESSION['userid']))
					{
				    if(isset($_POST['login']))
				    {
				        if(verificar_login($_POST['user'],$_POST['password'],$result) == 1)
				        {
				            $_SESSION['userid'] = $result->idusuario;
				            header("location:fabrica.html");
				        }

				    }
				?>
				<!-- Formulario delogin -->
				<form action="" method="post" class="login">
				    <div><label>Username</label><input name="user" type="text" ></div>
				    <div><label>Password</label><input name="password" type="password"></div>
				    <div><input name="login" type="submit" value="login"></div>
				    <p>User:fabrica, pass:fabrica</p>
				</form>

				<?php
					} else {
					    echo 'Su usuario ingreso correctamente.';
					    echo '<a href="logout.php">Logout</a>';
					}
				?>
			<form action="" method="post" class="login">
				    <div><button class="opcion" type ='button' onclick="location.href='ventas.html'">Tienda</button></div>
			</form>
			</span>
</body>
</html>
