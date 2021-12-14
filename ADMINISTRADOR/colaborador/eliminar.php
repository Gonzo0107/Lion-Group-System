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

	$sentencia = $bd->prepare("DELETE FROM colaborador WHERE id_colaborador = ?;");
	$resultado = $sentencia->execute([$codigo]);
	
	if ($resultado === TRUE) {

		echo '<script>';
			echo 'alert("Colaborador Eliminado Correctamente!!");';
			echo 'window.location.href="colaborador.php";';
		echo '</script>';


	}else{
		echo "error";
	}

		}else{
		echo 'error en el sistema';
	}
 ?>