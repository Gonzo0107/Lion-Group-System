<?php 
session_start();
	if (!isset($_SESSION['nombre2'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre2'])){

	if (!isset($_GET['id'])) {
		header('location:index.php');
	}

	include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
	include 'C:/xampp/htdocs/lion_group_system/AUXILIAR ADMINISTRATIVO/eps/vistas/pagina_superior.php';  
	$id = $_GET['id'];

	$sentencia = $bd->prepare("SELECT * FROM eps WHERE id_eps=?;");
	$sentencia->execute([$id]);
	$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

	
	}else{
		echo 'error en el sistema';
	}
	
 ?>

 <div class="container px-4">
<h1 class="mt-4 ">EPS</h1>
<h5 class="text-secondary mt-2">Editar EPS</h5>
<div class="container px-4 border border-secondary shadow p-3 mb-5 bg-white rounded">


 		
			<h4>Nuevos datos de EPS</h4>
			<form method="POST" action="editarProceso.php">
			
				 <div class="row">
				 <div class="form-group col-md-4">
					<label class="col-sm-2 col-form-label" >Id eps</label>
					<input class="form-control" type="text" name="id_eps2" value="<?php echo $resultado->id_eps; ?>" required>
				</div>
				<div class="form-group col-md-4">
					<label class="col-sm-4 col-form-label" >Nombre EPS</label>
					<input class="form-control" type="text" name="nombre_eps2" value="<?php echo $resultado->nombre_eps; ?>" required>
				</div>
				<div class="form-group col-md-4">
					<label class="col-sm-4 col-form-label" >Numero nit</label>
					<input class="form-control" type="text" name="numero_nit2" value="<?php echo $resultado->numero_nit; ?>" required>
				</div>
				</div>
				<div class="row">
				<div class="form-group col-md-6">
					<label class="col-sm-2 col-form-label" >Telefono</label>
					<input class="form-control" type="text" name="telefono2" value="<?php echo $resultado->telefono; ?>" required>
				</div>
				<div class="form-group col-md-6">
					<label class="col-sm-2 col-form-label" >Direccion</label>
					<input class="form-control" type="text" name="direccion2" value="<?php echo $resultado->direccion; ?>" required>
				</div>
				</div>
				<div class="row">
				<div class="form-group col-md-4">
					<label class="col-sm-2 col-form-label" >Estado: </label>
					<?php 
							include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM eps INNER JOIN estado ON eps.id_estado = estado.id_estado WHERE id_eps=?;");
							$sentencia->execute([$id]);
							$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
							echo $resultado->tipo_estado; 
						?>
					</div>
				<div class="form-group ">
					<label class="col-sm-4 col-form-label" >Nuevo estado</label>	
					
					<select class="form-control" name="id_estado2" required>
					<option value="">Tipo de salud</option>
						<?php 
							include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM estado");
							$sentencia->execute([$id]);
							$datos = $sentencia->fetchAll(PDO::FETCH_OBJ);

						 	foreach ($datos as $dato) {
                            echo "<option value=".$dato->id_estado.">".$dato->tipo_estado."</option>";
                     	} ?> 	 
					</select>
					   	</div>
				</div>
				
				<br>
					<input type="hidden" name="oculto">
					<input class="btn btn-primary" type="submit" name="editar" value="Editar"> 
					<a type="submit" class="btn btn-danger"  href="eps.php">Cancelar</a>
			

				
			</form>
	
</div>
		<?php 

include 'C:/xampp/htdocs/lion_group_system/AUXILIAR ADMINISTRATIVO/eps/vistas/pagina_inferior.php';  

 ?>