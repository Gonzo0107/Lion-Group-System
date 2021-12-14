<?php 

session_start();
	if (!isset($_SESSION['nombre'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre'])){	

	include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
	include 'C:/xampp/htdocs/lion_group_system/ADMINISTRADOR/tipopension/vistas/pagina_superior.php'; 
	$id = $_GET['id'];

	$sentencia = $bd->prepare("SELECT * FROM tipo_pension WHERE id_pension=?;");
	$sentencia->execute([$id]);
	$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

		}else{
		echo 'error en el sistema';
	}

 ?>
 <div class="container px-4">
<h1 class="mt-4 ">Tipo de pension</h1>
<h5 class="text-secondary mt-2">Editar tipo de pension</h5>
<div class="container px-4 border border-secondary shadow p-3 mb-5 bg-white rounded">

			<h4>Nuevos datos Tipo de pension</h4>
			<form method="POST" action="editarProceso.php">
	
				
				<div class="form-group col-md-6">
					<label class="col-sm-6 col-form-label" >Id pension</label>
					<input class="form-control" type="text" name="id_pension2" value="<?php echo $resultado->id_pension; ?>" required>
				</div>

				<div class="row">
				<div class="form-group col-md-4">
				<label class="col-sm-6 col-form-label" >Pension actual:</label> 
					
					<?php 
							include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM tipo_pension WHERE id_pension=?;");
							$sentencia->execute([$id]);
							$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
							echo $resultado->nombre_pension; 
						?>
			
				</div>
				<div class="form-group col-md-4">

					<label class="col-sm-6 col-form-label" >Descripcion actual:</label> 
					<?php 
							include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM tipo_pension WHERE id_pension=?;");
							$sentencia->execute([$id]);
							$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
							echo $resultado->descripcion; 
						?>
						</div>	
				</div>
				<div class="row">
				<div class="form-group col-md-4">

					<label class="col-sm-4 col-form-label" >Nueva pension</label> 
					<input class="form-control" type="text" name="nombre_pension2" value="<?php echo $resultado->nombre_pension; ?>" required>
				</div>
				<div class="form-group col-md-4">
				
					<label class="col-sm-6 col-form-label" >Nueva descripcion</label> 
					<input class="form-control" type="text" name="descripcion2" value="<?php echo $resultado->descripcion; ?>" required>
				</div>
				</div>

				<br>
				
					<input type="hidden" name="oculto">
					<input class="btn btn-primary" type="submit" name="editar" value="Editar"> 
					<a type="submit" class="btn btn-danger"  href="tipopension.php">Cancelar</a>
				

				
			</form>

</div>

				<?php 

include 'C:/xampp/htdocs/lion_group_system/ADMINISTRADOR/tipopension/vistas/pagina_inferior.php';

 ?>