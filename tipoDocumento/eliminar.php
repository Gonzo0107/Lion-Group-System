<?php

session_start();
	if (!isset($_SESSION['nombre'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre'])){	

	if (!isset($_GET['id'])) {
		exit();
	}

	include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';
	$codigo = $_GET['id'];

	$sentencia = $bd->prepare("DELETE FROM tipo_documento WHERE id_tipo_documento = ?;");
	$resultado = $sentencia->execute([$codigo]);
	
	if ($resultado === TRUE) {


		echo '<script>';
			echo 'alert("Tipo de documento Eliminado Correctamente!!");';
			echo 'window.location.href="tipodocumento.php";';
		echo '</script>';


	}else{
		echo "error";
	}

			}else{
		echo 'error en el sistema';
	}
 ?>