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
	$id_tipo_colaborador2 = $_POST['id_tipo_colaborador2'];
	$tipo_colaborador2 = $_POST['tipo_colaborador2'];
	$funcion2 = $_POST['funcion2'];

	$sentencia = $bd->prepare("UPDATE tipo_colaborador SET id_tipo_colaborador = ?, tipo_colaborador = ?, funcion = ? WHERE id_tipo_colaborador = ?;");
	$resultado = $sentencia->execute([$id_tipo_colaborador2,$tipo_colaborador2,$funcion2,$id_tipo_colaborador2]);

	if ($resultado === TRUE) {

		echo '<script>';
			echo 'alert("Tipo de colaborador Editado Correctamente!!");';
			echo 'window.location.href="tipocolaborador.php";';
		echo '</script>';

	}else{
		echo "error";
	}

	}else{
		echo 'error en el sistema';
	}



 ?>