<?php 
session_start();
	if (!isset($_SESSION['nombre'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre'])){	

	if (!isset($_GET['id'])) {
		exit();
	}

	include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
	$codigo = $_GET['id'];

	$sentencia = $bd->prepare("DELETE FROM eps WHERE id_eps = ?;");
	$resultado = $sentencia->execute([$codigo]);
	
	if ($resultado === TRUE) {
		header('location:eps.php');
	}else{
		echo "error";
	}

	}else{
		echo 'error en el sistema';
	}
 ?>