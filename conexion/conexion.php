<?php 

$contrasena = '';
$usuario = 'root';
$nombrebd = 'lion_group_system';


	try {
	
	$bd = new PDO('mysql:host=localhost:3306; dbname='.$nombrebd,$usuario,$contrasena);
	
	} catch (Exception $e) {
		echo "error conexion" .$e->getMessage();
	}




 ?>