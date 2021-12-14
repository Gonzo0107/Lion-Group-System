<?php 

//print_r($_POST); //verificar envio de datos

session_start();
	if (!isset($_SESSION['nombre'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre'])){	

	include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
	$id_colaborador = $_POST['id_colaborador'];
	$id_tipo_documento = $_POST['id_tipo_documento'];
	$documento = $_POST['documento'];
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$id_tipo_colaborador = $_POST['id_tipo_colaborador'];
	$telefono = $_POST['telefono'];
	$id_estado = $_POST['id_estado'];
	$correo = $_POST['correo'];
	$usuario = $_POST['usuario'];
	$contraseña = $_POST['contraseña'];

	$sentencia = $bd->prepare("INSERT INTO colaborador(id_colaborador,id_tipo_documento,documento,nombre,apellidos,id_tipo_colaborador,telefono,correo,id_estado,usuario,contraseña) VALUES (?,?,?,?,?,?,?,?,?,?,?);");
	$resultado = $sentencia->execute([$id_colaborador,$id_tipo_documento,$documento,$nombre,$apellidos,$id_tipo_colaborador,$telefono,$correo,$id_estado,$usuario,$contraseña]);

	if ($resultado === TRUE) {

		echo '<script>';
			echo 'alert("Colaborador Insertado Correctamente!!");';
			echo 'window.location.href="colaborador.php";';
		echo '</script>';


	}else{
		echo "error";
	}

	}else{
		echo 'error en el sistema';
	}

 ?>
