<?php 
session_start();
	if (!isset($_SESSION['nombre'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre'])){

	if (!isset($_POST['oculto'])) {
		exit();
	}

	include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
	$id_eps = $_POST['id_eps'];
	$nombre_eps = $_POST['nombre_eps'];
	$numero_nit = $_POST['numero_nit'];
	$telefono = $_POST['telefono'];
	$direccion = $_POST['direccion'];
	$id_estado = $_POST['id_estado'];

	$sentencia = $bd->prepare("INSERT INTO eps(id_eps,nombre_eps,numero_nit,telefono,direccion,id_estado) VALUES (?,?,?,?,?,?);");
	$resultado = $sentencia->execute([$id_eps,$nombre_eps,$numero_nit,$telefono,$direccion,$id_estado]);

	if ($resultado === TRUE) {
		
		echo '<script>';
			echo 'alert("EPS insertada Correctamente !!");';
			echo 'window.location.href="eps.php";';
		echo '</script>';

	}else{
		echo "error";
	}

	}else{
		echo 'error en el sistema';
	}

 ?>

