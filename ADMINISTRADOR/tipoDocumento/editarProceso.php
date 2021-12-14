<?php 
//print_r($_POST);

	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre'])){	

	if (!isset($_POST['oculto'])) {
		header('location:estado.php');
	}

	include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';
	$id_tipo_documento2 = $_POST['id_tipo_documento2'];
	$tipo_documento2 = $_POST['tipo_documento2'];

	$sentencia = $bd->prepare("UPDATE tipo_documento SET id_tipo_documento = ?, tipo_documento = ? WHERE id_tipo_documento = ?;");
	$resultado = $sentencia->execute([$id_tipo_documento2,$tipo_documento2,$id_tipo_documento2]);

	if ($resultado === TRUE) {


		echo '<script>';
			echo 'alert("Tipo de documento Editado Correctamente!!");';
			echo 'window.location.href="tipodocumento.php";';
		echo '</script>';


	}else{
		echo "error";
	}

		}else{
		echo 'error en el sistema';
	}


 ?>