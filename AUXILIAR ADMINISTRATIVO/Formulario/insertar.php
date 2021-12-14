<?php 

//print_r($_POST); 

session_start();
	if (!isset($_SESSION['nombre2'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre2'])){

	include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
	$id_formulario = $_POST['id_formulario'];
	$id_salud = $_POST['id_salud'];
	$id_pension = $_POST['id_pension'];
	$id_colaborador = $_POST['id_colaborador'];
	$id_tipo_documento = $_POST['id_tipo_documento'];
	$numero_documento = $_POST['numero_documento'];
	$nombre_cotizante = $_POST['nombre_cotizante'];
	$apellidos_cotizante = $_POST['apellidos_cotizante'];
	$nombre_razon = $_POST['nombre_razon'];
	$numero_nit = $_POST['numero_nit'];
	$fecha_radicacion = $_POST['fecha_radicacion'];
	$id_eps = $_POST['id_eps'];

	$sentencia = $bd->prepare("INSERT INTO formulario(id_formulario,id_salud,id_pension,id_colaborador,id_tipo_documento,numero_documento,nombre_cotizante,apellidos_cotizante,nombre_razon,numero_nit,fecha_radicacion,id_eps) VALUES (?,?,?,?,?,?,?,?,?,?,?,?);");
	$resultado = $sentencia->execute([$id_formulario,$id_salud,$id_pension,$id_colaborador,$id_tipo_documento,$numero_documento,$nombre_cotizante,$apellidos_cotizante,$nombre_razon,$numero_nit,$fecha_radicacion,$id_eps]);

	if ($resultado === TRUE) {

		echo '<script>';
			echo 'alert("Novedad Insertada Correctamente!!");';
			echo 'window.location.href="formulario.php";';
		echo '</script>';

	}else{
		echo "error";
	}

	}else{
		echo 'error en el sistema';
	}


 ?>