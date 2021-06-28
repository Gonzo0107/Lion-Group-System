<?php 

include("conexion.php");	

if (isset($_GET['id_inf'])){
	$id_inf = $_GET['id_inf'];
	$query = "DELETE FROM expediente WHERE id_inf = $id_inf";

	$result = mysqli_query($conex, $query);

	if (!$result){
		die("query failed");   
	}


	$_SESSION['message'] = 'tarea removida';



   header("location: index_inf.php");
	
}

?>
