<?php 

session_start();
	if (!isset($_SESSION['nombre'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre'])){	
		
	
include 'C:/xampp/htdocs/lion_group_system/ADMINISTRADOR/eps/vistas/pagina_superior.php';   
include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';
	$sentencia = $bd->query("SELECT * FROM reclamaciones INNER JOIN colaborador ON reclamaciones.id_colaborador = colaborador.id_colaborador");
	$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

	}else{
		echo 'error en el sistema';
	}

 ?>

 <div class="container px-4">
 <div class="row pt-5">
 <div class="form-group col-md-4">
<h1>Reclamaciones</h1>
</div>
<div class="form-group pt-2 col-md-3">
<a href="reclamacionesinsertar.php" class="btn btn-success ">Insertar Reclamacion</a>
</div>
</div>

<br>

<div class="container px-4 border border-secondary shadow p-3 mb-5 bg-white rounded">
	<h4>Buscar Reclamacion</h4>
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

				$consulta = $bd->query("SELECT * FROM reclamaciones INNER JOIN colaborador ON reclamaciones.id_colaborador = colaborador.id_colaborador  WHERE id_reclamaciones = '$busqueda' OR fecha_reclamacion = '$busqueda' OR Descripcion = '$busqueda' OR nombre = '$busqueda' OR apellidos = '$busqueda' ");
				$resultado = $consulta->fetchALL(PDO::FETCH_OBJ);

				foreach ($resultado as $resul) {
					?>
					<li><?php echo "$resul->id_reclamaciones | $resul->fecha_reclamacion | $resul->Descripcion | $resul->nombre | $resul->apellidos  "?></li>

					<?php
				}
			}	

			 ?>
					 <br>


<div class="border border-secondary shadow px-4 bg-white rounded " >
			 
			<table class="table">

	


	
		<tr>
			<th>Id reclamaciones</th>
			<th>Fecha de reclamacion</th>
			<th>Descripcion</th>
			<th>Colaborador</th>
			<th>Editar</th>
			<th>Eliminar</th>
			
		</tr>

		<?php 
		include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';
		$sentencia = $bd->query("SELECT * FROM reclamaciones INNER JOIN colaborador ON reclamaciones.id_colaborador = colaborador.id_colaborador");
		$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

			foreach ($datos as $dato) {
				?>
					<tr>
						<td><?php echo $dato->id_reclamaciones; ?></td>
						<td><?php echo $dato->fecha_reclamacion; ?></td>
						<td><?php echo $dato->Descripcion; ?></td>
						<td><?php echo $dato->nombre; ?> <?php echo $dato->apellidos; ?></td>
						<td><a type="submit" class="btn btn-primary" href="editar.php?id=<?php echo $dato->id_reclamaciones; ?>" >Editar</td>
						<td><a type="submit" class="btn btn-danger"  href="eliminar.php?id=<?php echo $dato->id_reclamaciones; ?>">Eliminar</td>
						
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