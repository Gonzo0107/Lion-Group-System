<?php 
//print_r($_POST);

	session_start();
	if (!isset($_SESSION['nombre2'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre2'])){	

	if (!isset($_POST['oculto'])) {
		header('location:tipopension.php');
	}

	include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';
	$id_pension2 = $_POST['id_pension2'];
	$nombre_pension2 = $_POST['nombre_pension2'];
	$descripcion2 = $_POST['descripcion2'];

	$sentencia = $bd->prepare("UPDATE tipo_pension SET id_pension = ?, nombre_pension = ?, descripcion = ? WHERE id_pension = ?;");
	$resultado = $sentencia->execute([$id_pension2,$nombre_pension2,$descripcion2,$id_pension2]);

	if ($resultado === TRUE) {

		echo '<script>';
			echo 'alert("Tipo de pension Editada Correctamente!!");';
			echo 'window.location.href="tipopension.php";';
		echo '</script>';

	}else{
		echo "error";
	}

	}else{
		echo 'error en el sistema';
	}


 ?>