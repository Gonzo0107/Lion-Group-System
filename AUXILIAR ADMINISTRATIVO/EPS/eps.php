<?php 

session_start();
      
       if (!isset($_SESSION['nombre2'])) {
        header('location: http://localhost/lion_group_system/login/login.php');
    }elseif(isset($_SESSION['nombre2'])){ 


include 'C:/xampp/htdocs/lion_group_system/AUXILIAR ADMINISTRATIVO/eps/vistas/pagina_superior.php';    
    include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
    $sentencia = $bd->query("SELECT * FROM eps INNER JOIN estado ON eps.id_estado = estado.id_estado");
    $datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

    

    }else{
        echo 'error en el sistema';
    }



 ?>
 <div class="container px-4">

 <div class="row pt-5">
 <div class="form-group col-md-1">
<h1>EPS</h1>
</div>
<div class="form-group pt-2 col-md-2">
<a href="epsinsertar.php" class="btn btn-success ">Insertar EPS</a>
</div>
</div>

<br>

<div class="container px-4 py-4 border border-secondary shadow bg-white rounded">
	<h4>Buscar EPS</h4>
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
			<h5 class="text-secondary mt-2">Resultado:</h5>
			<?php 

				

			if (isset($_GET['enviar'])) {
				$busqueda = $_GET['busqueda'];

				$consulta = $bd->query("SELECT * FROM eps INNER JOIN estado ON eps.id_estado = estado.id_estado  WHERE nombre_eps = '$busqueda' OR id_eps = '$busqueda' OR numero_nit = '$busqueda' OR direccion = '$busqueda' OR tipo_estado = '$busqueda' ");
				$resultado = $consulta->fetchALL(PDO::FETCH_OBJ);

				foreach ($resultado as $resul) {
					?>
					<li class="form-group"><?php echo "$resul->id_eps | $resul->nombre_eps | $resul->telefono | $resul->numero_nit | $resul->direccion | $resul->tipo_estado "?></li>

					<?php
				}
			}	

			 ?>
	<br>
<div class="container px-4 border border-secondary shadow p-3 mb-5 bg-white rounded">



<br>

			<table class="table ">
				<tr>
					<th>Id eps</th>
					<th>Nombre eps</th>
					<th>Numero nit</th>
					<th>Telefono</th>
					<th>Direccion</th>
					<th>Estado</th>
					<th>Editar</th>
					<th>Eliminar</th>
					

				</tr>

				<?php 

    
    				include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
    				$sentencia = $bd->query("SELECT * FROM eps INNER JOIN estado ON eps.id_estado = estado.id_estado");
   					$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);


					foreach ($datos as $dato) {
						?>
							<tr>
								<td><?php echo $dato->id_eps; ?></td>		
								<td><?php echo $dato->nombre_eps; ?></td>
								<td><?php echo $dato->numero_nit; ?></td>
								<td><?php echo $dato->telefono; ?></td>
								<td><?php echo $dato->direccion; ?></td>
								<td><?php echo $dato->tipo_estado; ?></td>
								<td><a type="submit" class="btn btn-primary" href="editar.php?id=<?php echo $dato->id_eps; ?>" >Editar</td>
								<td><a type="submit" class="btn btn-danger"  href="eliminar.php?id=<?php echo $dato->id_eps; ?>">Eliminar</td>

							</tr>
						<?php
					}

				 ?>

				</table>
				</div>
			
</div>

<?php 

include 'C:/xampp/htdocs/lion_group_system/AUXILIAR ADMINISTRATIVO/eps/vistas/pagina_inferior.php';   

 ?>