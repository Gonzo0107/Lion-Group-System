<?php
	include 'C:/xampp/htdocs/lion_group_system/login/vistas/pagina_superior.php';
	include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';


	session_start();
	if (isset($_SESSION['nombre'])) {
		header('location: http://localhost/lion_group_system/ADMINISTRADOR/principal/principal.php');
	}elseif (isset($_SESSION['nombre1'])) {
		header('location: http://localhost/lion_group_system/ASESOR DE VENTAS/principal/principal.php');
	}elseif (isset($_SESSION['nombre2'])) {
		header('location: http://localhost/lion_group_system/AUXILIAR ADMINISTRATIVO/principal/principal.php');
	}


	
 ?>
		

<head>
	<title>login</title>
	
</head>
<body>
<link rel="stylesheet" type="text/css" href="http://localhost/lion_group_system/login/css/login3.css">
<center>

<div class="container" id="imagen"> 
<img id="lion" src="http://localhost/lion_group_system/Login/assets/img/imagen1.png">
<p id="p">Lion Group System ©</p>
 </div>
<div class="form-group" id="login">
<h3 class="form-group">Inicio Sesion</h3>
<form method="POST" action="loginProceso.php">

	
	


    <i class="fas fa-user-alt" id="uwu" ></i> <label id="us1">usuario</label>
	<input type="text" name="usuario" id="us" required>
	<br>
	<i class="fas fa-key" id="uwu1" ></i>
	<label id="con1">contraseña</label>
	<input type="password" name="contraseña" id="con" required>
	<br>
	<input class="btn btn-primary" id="ic" type="submit" value="iniciar sesion">

	
		
	
</form>
</center>
</div>

		<?php 

include 'C:/xampp/htdocs/lion_group_system/login/vistas/pagina_inferior.php';

 ?>