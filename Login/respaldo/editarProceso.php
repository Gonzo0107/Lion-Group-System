<?php 

session_start();
	if (!isset($_SESSION['nombre'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre'])){

	if (!isset($_POST['oculto'])) {
		header('location:index.php');
	}

	include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
	$id_eps2 = $_POST['id_eps2'];
	$nombre_eps2 = $_POST['nombre_eps2'];
	$numero_nit2 = $_POST['numero_nit2'];
	$telefono2 = $_POST['telefono2'];
	$direccion2 = $_POST['direccion2'];
	$id_estado2 = $_POST['id_estado2'];

	$sentencia = $bd->prepare("UPDATE eps SET id_eps = ?, nombre_eps = ?, numero_nit = ?, telefono = ?, direccion = ?, id_estado = ? WHERE id_eps = ?;");
	$resultado = $sentencia->execute([$id_eps2,$nombre_eps2,$numero_nit2,$telefono2,$direccion2,$id_estado2,$id_eps2]);

	if ($resultado === TRUE) {
		header('location:eps.php');
	}else{
		echo "error";
	}

	
	}else{
		echo 'error en el sistema';
	}


 ?>