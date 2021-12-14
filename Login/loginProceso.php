<?php 
	session_start();
	include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
	$usuario = $_POST['usuario'];
	$contraseña = $_POST['contraseña'];

	
	
	$sentencia = $bd->prepare("SELECT * FROM colaborador WHERE usuario = ? and contraseña = ? ");
	$sentencia->execute([$usuario,$contraseña]);
	$datos = $sentencia->fetch(PDO::FETCH_OBJ);
	
	if ($datos === false) {
		echo '<script>';
			echo 'alert("Usuario o Contraseña Incorrectas !!");';
			echo 'window.location.href="login.php";';
		echo '</script>';	
	}elseif ($sentencia->rowCount() == 1 && $datos->id_tipo_colaborador == 3 ) {
        $_SESSION['nombre'] = $datos->usuario;
		echo '<script>';
			echo 'alert("Bienvenido Administrador !!");';
			echo 'window.location.href="http://localhost/lion_group_system/ADMINISTRADOR/principal/principal.php";';
		echo '</script>';	
	}elseif ($sentencia->rowCount() == 1 && $datos->id_tipo_colaborador == 1 ) {
		$_SESSION['nombre1'] = $datos->usuario;
		echo '<script>';
			echo 'alert("Bienvenido Asesor de ventas !!");';
			echo 'window.location.href="http://localhost/lion_group_system/ASESOR DE VENTAS/principal/principal.php";';
		echo '</script>';
	}elseif ($sentencia->rowCount() == 1 && $datos->id_tipo_colaborador == 2 ) {
		$_SESSION['nombre2'] = $datos->usuario;
		echo '<script>';
			echo 'alert("Bienvenido Auxiliar Administrativo !!");';
			echo 'window.location.href="http://localhost/lion_group_system/AUXILIAR ADMINISTRATIVO/principal/principal.php";';
		echo '</script>';
	}
 ?>