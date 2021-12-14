<?php 

session_start();
	if (!isset($_SESSION['nombre1'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre1'])){	
	
	$nombre1 = $_SESSION['nombre1'];
	include 'C:/xampp/htdocs/lion_group_system/ASESOR DE VENTAS/comision/vistas/pagina_superior.php';  
	include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
	$sentencia = $bd->query("SELECT * FROM comision INNER JOIN tipo_salud ON comision.id_salud = tipo_salud.id_salud INNER JOIN tipo_pension ON comision.id_pension = tipo_pension.id_pension INNER JOIN colaborador ON comision.id_colaborador = colaborador.id_colaborador INNER JOIN eps ON comision.id_eps = eps.id_eps INNER JOIN formulario ON comision.id_formulario = formulario.id_formulario WHERE usuario = '$nombre1' " );
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
</div>

<br>
<div class="px-4 py-4 border border-secondary shadow bg-white rounded pb-5" >

	<h4>Ver Comision</h4>

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


	</tr>

	<?php 
	
	include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
	$sentencia = $bd->query("SELECT * FROM comision INNER JOIN tipo_salud ON comision.id_salud = tipo_salud.id_salud INNER JOIN tipo_pension ON comision.id_pension = tipo_pension.id_pension INNER JOIN colaborador ON comision.id_colaborador = colaborador.id_colaborador INNER JOIN eps ON comision.id_eps = eps.id_eps INNER JOIN formulario ON comision.id_formulario = formulario.id_formulario WHERE usuario = '$nombre1' " );
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

					
					
				</tr>
			<?php
		}

	 ?>
</div>
 
</table>

	</div>	
			

<?php 

include 'C:/xampp/htdocs/lion_group_system/ASESOR DE VENTAS/comision/vistas/pagina_inferior.php';

 ?>
			

