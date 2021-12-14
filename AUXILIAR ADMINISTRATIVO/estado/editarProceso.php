<?php 
print_r($_POST);
session_start();
		if (!isset($_SESSION['nombre2'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre2'])){

	if (!isset($_POST['oculto'])) {
		header('location:estado.php');
	}

	include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';
	$id_estado2 = $_POST['id_estado2'];
	$tipo_estado2 = $_POST['tipo_estado2'];

	$sentencia = $bd->prepare("UPDATE estado SET id_estado = ?, tipo_estado = ? WHERE id_estado = ?;");
	$resultado = $sentencia->execute([$id_estado2,$tipo_estado2,$id_estado2]);

	if ($resultado === TRUE) {

		echo '<script>';
			echo 'alert("Estado Editado Correctamente!!");';
			echo 'window.location.href="estado.php";';
		echo '</script>';


	}else{
		echo "error";
	}

		}else{
		echo 'error en el sistema';
	}




 ?>