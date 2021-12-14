<?php 

session_start();
	if (!isset($_SESSION['nombre'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre'])){	
		
	
include 'C:/xampp/htdocs/lion_group_system/ADMINISTRADOR/eps/vistas/pagina_superior.php';   
include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';
	$sentencia = $bd->query("SELECT * FROM tipo_colaborador");
	$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

	}else{
		echo 'error en el sistema';
	}

 ?>


 <div class="container px-4">
 <div class="row pt-5">
 <div class="form-group col-md-3">
<h1>Tipo de colaborador</h1>
</div>
<div class="form-group pt-5 col-md-3">
<a href="tipocolaboradorinsertar.php" class="btn btn-success ">Insertar Tipo de colaborador</a>
</div>
</div>
<br>
<div class="container px-4 border border-secondary shadow p-3 mb-5 bg-white rounded">
	<h4>Buscar Tipo Colaborador</h4>
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

				$consulta = $bd->query("SELECT * FROM tipo_colaborador  WHERE id_tipo_colaborador = '$busqueda' OR tipo_colaborador = '$busqueda' OR funcion = '$busqueda' ");
				$resultado = $consulta->fetchALL(PDO::FETCH_OBJ);

				foreach ($resultado as $resul) {
					?>
					<li><?php echo "$resul->id_tipo_colaborador | $resul->tipo_colaborador | $resul->funcion "?></li>

					<?php
				}
			}	

			 ?>
			 <br>


<div class="border border-secondary shadow px-4 bg-white rounded " >
<table class="table">
	
	


		
			<tr>
				<th>Id tipo de colaborador</th>
				<th>Tipo de colaborador</th>
				<th>Funcion</th>
				<th>Editar</th>
				<th>Eliminar</th>
			
			</tr>

			<?php 
			include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';
			$sentencia = $bd->query("SELECT * FROM tipo_colaborador");
			$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

				foreach ($datos as $dato) {
					?>
						<tr>
							<td><?php echo $dato->id_tipo_colaborador; ?></td>
							<td><?php echo $dato->tipo_colaborador; ?></td>
							<td><?php echo $dato->funcion; ?></td>
							<td><a type="submit" class="btn btn-primary" href="editar.php?id=<?php echo $dato->id_tipo_colaborador; ?>" >Editar</td>
							<td><a type="submit" class="btn btn-danger"  href="eliminar.php?id=<?php echo $dato->id_tipo_colaborador; ?>">Eliminar</td>
							
						</tr>
					<?php
				}

			 ?>

			
		</table>

	</div>	


</div>

			<!-- fin insert -->

<?php 

include 'C:/xampp/htdocs/lion_group_system/ADMINISTRADOR/eps/vistas/pagina_inferior.php';

 ?>