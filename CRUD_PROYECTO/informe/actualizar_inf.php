<?php

 include("conexion.php");

if(isset($_GET['id_inf'])){
	$id_inf = $_GET['id_inf'];
	$query = "SELECT * FROM informe WHERE id_inf = $id_inf";
	$result = mysqli_query($conex, $query);
	if (mysqli_num_rows($result) == 1){

		$row = mysqli_fetch_array($result);
		
		$id_inf = $row['id_inf'];
		$descripcion = $row['descripcion'];
		

	}

}

if (isset($_POST['actualizar'])) {

	$id_inf = $_POST['id_inf'];
	$descripcion = $_POST['descripcion'];


	$query = "UPDATE informe SET  id_inf = '$id_inf' , descripcion = '$descripcion' WHERE id_inf =$id_inf";

	mysqli_query($conex, $query);

	$_SESSION['message'] = 'tarea actualizada';
	


	header("location: index_inf.php");
}

?>




<div >
<div >
<div >
<div >
<form action="actualizar_inf.php?id_inf=<?php echo $_GET['id_inf']; ?>" method="POST">
	
	<div >
		<textarea name="descripcion" rows="2" placeholder="descripcion"><?php echo $descripcion; ?></textarea>
	</div>


	<button name="actualizar">
		Actualizar
	</button>
</form>
	
</div>
	
</div>
	
</div>
	
</div>

