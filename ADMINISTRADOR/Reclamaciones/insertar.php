<?php 

//print_r($_POST); verificar envio de datos
session_start();
	if (!isset($_SESSION['nombre'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre'])){

	include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';
	$id_reclamaciones = $_POST['id_reclamaciones'];
	$fecha_reclamacion = $_POST['fecha_reclamacion'];
	$descripcion = $_POST['descripcion'];
	$id_colaborador = $_POST['id_colaborador'];


	$sentencia = $bd->prepare("INSERT INTO reclamaciones(id_reclamaciones,fecha_reclamacion,descripcion,id_colaborador) VALUES (?,?,?,?);");
	$resultado = $sentencia->execute([$id_reclamaciones,$fecha_reclamacion,$descripcion,$id_colaborador]);

	if ($resultado === TRUE) {

		echo '<script>';
			echo 'alert("Reclamacion Insertada Correctamente!!");';
			echo 'window.location.href="reclamaciones.php";';
		echo '</script>';

	}else{
		echo "error";
	}

		}else{
		echo 'error en el sistema';
	}

 ?>
