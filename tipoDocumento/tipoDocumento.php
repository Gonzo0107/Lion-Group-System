<?php 

session_start();
	if (!isset($_SESSION['nombre'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre'])){	
		
	
include 'C:/xampp/htdocs/lion_group_system/ADMINISTRADOR/eps/vistas/pagina_superior.php';   
include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';
	$sentencia = $bd->query("SELECT * FROM tipo_documento");
	$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

	}else{
		echo 'error en el sistema';
	}

 ?>

 <div class="container px-4">
 <div class="row pt-5">
 <div class="form-group col-md-3">
<h1>Tipo de documento</h1>
</div>
<div class="form-group pt-5 col-md-4">
<a href="tipodocumentoinsertar.php" class="btn btn-success ">Insertar Tipo de Documento</a>
</div>
</div>
<br>

<div class="container px-4 border border-secondary shadow p-3 mb-5 bg-white rounded">
	<h4>Buscar Tipo Documento</h4>
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

				$consulta = $bd->query("SELECT * FROM tipo_documento  WHERE id_tipo_documento = '$busqueda' OR tipo_documento = '$busqueda' ");
				$resultado = $consulta->fetchALL(PDO::FETCH_OBJ);

				foreach ($resultado as $resul) {
					?>
					<li><?php echo "$resul->id_tipo_documento | $resul->tipo_documento "?></li>

					<?php
				}
			}	

			 ?>
			 <br>


<div class="border border-secondary shadow px-4 bg-white rounded " >
<table class="table">
	

		
			<tr>
				<th>Id tipo de documento</th>
				<th>tipo de documento</th>
				<th>editar</th>
				<th>eliminar</th>

			</tr>

			<?php 

				foreach ($datos as $dato) {
					?>
						<tr>
							<td><?php echo $dato->id_tipo_documento; ?></td>
							<td><?php echo $dato->tipo_documento; ?></td>
							<td><a type="submit" class="btn btn-primary" href="editar.php?id=<?php echo $dato->id_tipo_documento; ?>" >Editar</td>
							<td><a type="submit" class="btn btn-danger"  href="eliminar.php?id=<?php echo $dato->id_tipo_documento; ?>">Eliminar</td>
							
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