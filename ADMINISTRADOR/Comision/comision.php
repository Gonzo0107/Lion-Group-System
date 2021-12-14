<?php 

session_start();
	if (!isset($_SESSION['nombre'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre'])){	
	
	include 'C:/xampp/htdocs/lion_group_system/ADMINISTRADOR/eps/vistas/pagina_superior.php';  
	include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
	$sentencia = $bd->query("SELECT * FROM comision INNER JOIN tipo_salud ON comision.id_salud = tipo_salud.id_salud INNER JOIN tipo_pension ON comision.id_pension = tipo_pension.id_pension INNER JOIN colaborador ON comision.id_colaborador = colaborador.id_colaborador INNER JOIN eps ON comision.id_eps = eps.id_eps INNER JOIN formulario ON comision.id_formulario = formulario.id_formulario " );
	$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

	}else{
		echo 'error en el sistema';
	}
 ?>



 <div class=" px-5" style="width: 1200px;">

 <div class="row pt-5">
 <div class="form-group col-md-2">
<h1>Comision</h1>
</div>
<div class="form-group pt-2 col-md-2">
<a href="insertarcomision.php" class="btn btn-success ">Insertar Comision</a>
</div>
</div>

<br>
<div class="px-4 py-4 border border-secondary shadow bg-white rounded pb-5" >

	<h4>Buscar Comision</h4>
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

				$consulta = $bd->query("SELECT * FROM comision INNER JOIN tipo_salud ON comision.id_salud = tipo_salud.id_salud INNER JOIN tipo_pension ON comision.id_pension = tipo_pension.id_pension INNER JOIN colaborador ON comision.id_colaborador = colaborador.id_colaborador INNER JOIN eps ON comision.id_eps = eps.id_eps  WHERE nombre = '$busqueda' OR id_comision = '$busqueda' OR nombre_eps = '$busqueda' OR nombre_salud = '$busqueda' OR nombre_pension = '$busqueda' OR fecha_radicacion = '$busqueda' OR liquidacion = '$busqueda' OR apellidos = '$busqueda' ");
				$resultado = $consulta->fetchALL(PDO::FETCH_OBJ);

				foreach ($resultado as $resul) {
					?>
					<li><?php echo "$resul->id_comision | $resul->nombre_salud | $resul->nombre_pension | $resul->nombre | $resul->apellidos | $resul->fecha_radicacion | $resul->liquidacion | $resul->nombre_eps | $resul->id_comision "?></li>

					<?php
				}
			}	

			 ?>
<br>

<div class="border border-secondary shadow  bg-white rounded p-3 ">

<table class="table">
	<tr>
		<th>Id comision</th>
		<th>Nombre de salud</th>
		<th>Nombre de pension</th>
		<th>Nombre colaborador</th>
		<th>Fecha de radicacion</th>
		<th>Liquidacion</th>
		<th>Nombre de EPS</th>
		<th>Formulario</th>
		<th>Editar</th>
		<th>Eliminar</th>

	</tr>

	<?php 
	
	include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
	$sentencia = $bd->query("SELECT * FROM comision INNER JOIN tipo_salud ON comision.id_salud = tipo_salud.id_salud INNER JOIN tipo_pension ON comision.id_pension = tipo_pension.id_pension INNER JOIN colaborador ON comision.id_colaborador = colaborador.id_colaborador INNER JOIN eps ON comision.id_eps = eps.id_eps INNER JOIN formulario ON comision.id_formulario = formulario.id_formulario " );
	$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

		foreach ($datos as $dato) {
			?>
				<tr>
					<td><?php echo $dato->id_comision; ?></td>
					<td><?php echo $dato->nombre_salud; ?></td>
					<td><?php echo $dato->nombre_pension; ?></td>
					<td><?php echo $dato->nombre; ?> <?php echo $dato->apellidos; ?></td>
					<td><?php echo $dato->fecha_radicacion; ?></td>
					<td><?php echo $dato->liquidacion; ?></td>
					<td><?php echo $dato->nombre_eps; ?></td>
					<td><?php echo $dato->id_formulario; ?></td>
					<td><a type="submit" class="btn btn-primary" href="editar.php?id=<?php echo $dato->id_comision; ?>" >Editar</td>
					<td><a type="submit" class="btn btn-danger"  href="eliminar.php?id=<?php echo $dato->id_comision; ?>">Eliminar</td>
					
					
				</tr>
			<?php
		}

	 ?>
</div>
 
</table>

	</div>	


<?php 

include 'C:/xampp/htdocs/lion_group_system/ADMINISTRADOR/eps/vistas/pagina_inferior.php';

 ?>
		

