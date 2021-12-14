<?php 

session_start();
	if (!isset($_SESSION['nombre'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre'])){	
	
include 'C:/xampp/htdocs/lion_group_system/ADMINISTRADOR/eps/vistas/pagina_superior.php';    
include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';
	$sentencia = $bd->query("SELECT * FROM tipo_pension");
	$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

		}else{
		echo 'error en el sistema';
	}


 ?>

 <div class="container px-4">
 <div class="row pt-5">
 <div class="form-group col-md-2">
<h1>Tipo de pension</h1>
</div>
<div class="form-group pt-5 col-md-4">
<a href="tipopensioninsertar.php" class="btn btn-success ">Insertar Tipo de pension</a>
</div>
</div>
<br>

<div class="container px-4 border border-secondary shadow p-3 mb-5 bg-white rounded pb-5">
	<h4>Buscar Tipo Pension</h4>
		<form action="" method="GET">
					<div class="row">
		<div class="form-group col-md-4">
				<input class="form-control" type="text" name="busqueda" >
			</div>
			<div class="form-group col-md-1">
				<input class="btn btn-primary" type="submit" name="enviar" value="Buscar">
			</div>
			<div class="form-group col-md-4">
				<input class="btn btn-outline-secondary" type="submit" name="refrescar" value="Refrescar">
			</div>
			</div>
			</form>
			<h5 class="text-secondary mt-2">Resultado</h5>
			<?php 

				

			if (isset($_GET['enviar'])) {
				$busqueda = $_GET['busqueda'];

				$consulta = $bd->query("SELECT * FROM tipo_pension  WHERE id_pension = '$busqueda' OR nombre_pension = '$busqueda' OR descripcion = '$busqueda' ");
				$resultado = $consulta->fetchALL(PDO::FETCH_OBJ);

				foreach ($resultado as $resul) {
					?>
					<li><?php echo "$resul->id_pension | $resul->nombre_pension | $resul->descripcion  "?></li>

					<?php
				}
			}	

			 ?>

			 <br>
<div class="container  border border-secondary shadow  bg-white rounded ">

<table class="table">


	
		<tr>
			<th>Id Pension</th>
			<th>Nombre de la pension</th>
			<th>Descripcion</th>
			<th>Editar</th>
			<th>Eliminar</th>
		
		</tr>

		<?php 
		include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';
		$sentencia = $bd->query("SELECT * FROM tipo_pension");
		$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

			foreach ($datos as $dato) {
				?>
					<tr>
						<td><?php echo $dato->id_pension; ?></td>
						<td><?php echo $dato->nombre_pension; ?></td>
						<td><?php echo $dato->descripcion; ?></td>
						<td><a type="submit" class="btn btn-primary" href="editar.php?id=<?php echo $dato->id_pension; ?>" >Editar</td>
						<td><a type="submit" class="btn btn-danger"  href="eliminar.php?id=<?php echo $dato->id_pension; ?>">Eliminar</td>
						
					</tr>
				<?php
			}

		 ?>

		
</table>
</div>
	</div>	




			

<?php 

include 'C:/xampp/htdocs/lion_group_system/ADMINISTRADOR/eps/vistas/pagina_inferior.php';

 ?>