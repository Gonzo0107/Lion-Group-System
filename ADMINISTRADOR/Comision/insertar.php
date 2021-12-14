<?php 

//print_r($_POST); verificar envio de datos
session_start();
	if (!isset($_SESSION['nombre'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre'])){	
		
	include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
	$id_comision = $_POST['id_comision'];
	$id_salud = $_POST['id_salud'];
	$id_pension = $_POST['id_pension'];
	$id_colaborador = $_POST['id_colaborador'];
	$fecha_radicacion = $_POST['fecha_radicacion'];
	$liquidacion = $_POST['liquidacion'];
	$id_eps = $_POST['id_eps'];
	$id_formulario = $_POST['id_formulario'];

	$sentencia = $bd->prepare("INSERT INTO comision(id_comision,id_salud,id_pension,fecha_radicacion,id_colaborador,liquidacion,id_eps,id_formulario) VALUES (?,?,?,?,?,?,?,?);");
	$resultado = $sentencia->execute([$id_comision,$id_salud,$id_pension,$fecha_radicacion,$id_colaborador,$liquidacion,$id_eps,$id_formulario]);

	if ($resultado === TRUE) {
		
		echo '<script>';
			echo 'alert("Comision Insertada!!");';
			echo 'window.location.href="comision.php";';
		echo '</script>';

	}else{
		echo "error";
	}

	
	}else{
		echo 'error en el sistema';
	}

 ?>
