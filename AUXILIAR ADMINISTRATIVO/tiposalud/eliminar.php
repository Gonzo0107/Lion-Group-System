<?php 

session_start();
	if (!isset($_SESSION['nombre2'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre2'])){	

	if (!isset($_GET['id'])) {
		exit();
	}

	include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';
	$codigo = $_GET['id'];

	$sentencia = $bd->prepare("DELETE FROM tipo_salud WHERE id_salud = ?;");
	$resultado = $sentencia->execute([$codigo]);
	
	if ($resultado === TRUE) {
		
	    echo '<script>';
			echo 'alert("EPS Eliminada Correctamente !!");';
			echo 'window.location.href="tiposalud.php";';
		echo '</script>';

	}else{
		echo "error";
	}

	}else{
		echo 'error en el sistema';
	}
 ?>