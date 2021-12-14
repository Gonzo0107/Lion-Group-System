<?php 

session_start();
	if (!isset($_SESSION['nombre'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre'])){	
	
 include 'C:/xampp/htdocs/lion_group_system/ADMINISTRADOR/colaborador/vistas/pagina_superior.php';  
	include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
	$sentencia = $bd->query("SELECT * FROM colaborador INNER JOIN tipo_documento ON colaborador.id_tipo_documento = tipo_documento.id_tipo_documento INNER JOIN tipo_colaborador ON colaborador.id_tipo_colaborador = tipo_colaborador.id_tipo_colaborador INNER JOIN estado ON colaborador.id_estado = estado.id_estado");
	$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

	}else{
		echo 'error en el sistema';
	}
 ?>

 <div  class=" px-4" style="width: 1600px;">

 <div class="row pt-5">
 <div class="form-group col-md-2">
<h1>Colaborador</h1>
</div>
<div class="form-group pt-2 col-md-2">
<a href="colaboradorinsertar.php" class="btn btn-success ">Insertar Colaborador</a>
</div>
</div>

<br>

<div class=" px-4 py-4 border border-secondary shadow bg-white rounded pb-5">
	<h4>Buscar Colaborador</h4>
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

				$consulta = $bd->query("SELECT * FROM colaborador INNER JOIN tipo_documento ON colaborador.id_tipo_documento = tipo_documento.id_tipo_documento INNER JOIN tipo_colaborador ON colaborador.id_tipo_colaborador = tipo_colaborador.id_tipo_colaborador INNER JOIN estado ON colaborador.id_estado = estado.id_estado  WHERE id_colaborador = '$busqueda' OR tipo_documento = '$busqueda' OR documento = '$busqueda' OR nombre = '$busqueda' OR apellidos = '$busqueda'  OR tipo_colaborador = '$busqueda' OR telefono = '$busqueda' OR correo = '$busqueda' OR tipo_estado = '$busqueda' OR usuario = '$busqueda'  ");
				$resultado = $consulta->fetchALL(PDO::FETCH_OBJ);

				foreach ($resultado as $resul) {
					?>
					<li><?php echo "$resul->id_colaborador | $resul->tipo_documento | $resul->documento | $resul->nombre | $resul->apellidos | $resul->tipo_colaborador | $resul->telefono | $resul->correo | $resul->tipo_estado | $resul->usuario| $resul->contraseña "?></li>

					<?php
				}
			}	

			 ?>

			 <br>

<div class="border border-secondary shadow px-4 bg-white rounded ">
			 <table class="table">
	




	
		
			<tr>
				<th>Id colaborador</th>
				<th>Tipo de documento</th>
				<th>Documento</th>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Tipo de colaborador</th>
				<th>Telefono</th>
				<th>Correo</th>
				<th>Estado</th>
				<th>Usuario</th>
				<th>Contraseña</th>	
				<th>Editar</th>
				<th>Eliminar</th>
		
			</tr>

			<?php 
			include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
			$sentencia = $bd->query("SELECT * FROM colaborador INNER JOIN tipo_documento ON colaborador.id_tipo_documento = tipo_documento.id_tipo_documento INNER JOIN tipo_colaborador ON colaborador.id_tipo_colaborador = tipo_colaborador.id_tipo_colaborador INNER JOIN estado ON colaborador.id_estado = estado.id_estado");
			$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

				foreach ($datos as $dato) {
					?>
						<tr>
							<td><?php echo $dato->id_colaborador; ?></td>
							<td><?php echo $dato->tipo_documento; ?></td>
							<td><?php echo $dato->documento; ?></td>
							<td><?php echo $dato->nombre; ?></td>
							<td><?php echo $dato->apellidos; ?></td>
							<td><?php echo $dato->tipo_colaborador; ?></td>
							<td><?php echo $dato->telefono; ?></td>
							<td><?php echo $dato->correo; ?></td>
							<td><?php echo $dato->tipo_estado; ?></td>
							<td><?php echo $dato->usuario; ?></td>
							<td><?php echo $dato->contraseña; ?></td>
							<td><a type="submit" class="btn btn-primary" href="editar.php?id=<?php echo $dato->id_colaborador; ?>" >Editar</td>
							<td><a type="submit" class="btn btn-danger"  href="eliminar.php?id=<?php echo $dato->id_colaborador; ?>">Eliminar</td>
							
						</tr>
					<?php
				}

			 ?>

			
		</table>

	</div>	

</div>
		
			

			


	<?php 

include 'C:/xampp/htdocs/lion_group_system/ADMINISTRADOR/colaborador/vistas/pagina_inferior.php';

 ?>