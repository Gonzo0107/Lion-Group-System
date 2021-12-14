<?php 
session_start();
	if (!isset($_SESSION['nombre2'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre2'])){

	include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
include 'C:/xampp/htdocs/lion_group_system/AUXILIAR ADMINISTRATIVO/principal/vistas/pagina_superior.php';  	
	$id = $_GET['id'];

	$sentencia = $bd->prepare("SELECT * FROM estado WHERE id_estado=?;");
	$sentencia->execute([$id]);
	$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

	
		}else{
		echo 'error en el sistema';
	}

 ?>

 <div class="container px-4">
<h1 class="mt-4 ">Estado</h1>
<h5 class="text-secondary mt-2">Editar Estado</h5>
<div class="container px-4 border border-secondary shadow p-3 mb-5 bg-white rounded">

			<h4>Nuevo estado</h4>
			<form method="POST" action="editarProceso.php">
		

				<div class="row">

			<div class="form-group col-md-4">
				<label class="col-sm-6 col-form-label">Id estado</label>
					<input class="form-control" type="text" name="id_estado2" value="<?php echo $resultado->id_estado; ?>" required>
			</div>
			</div>
			<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Estado actual:</label> 
					<?php 
							include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM estado WHERE id_estado=?;");
							$sentencia->execute([$id]);
							$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
							echo $resultado->tipo_estado; 
						?>
			</div>
			<div class="form-group col-md-4">
				<label class="col-sm-6 col-form-label">Tipo de estado</label>
				<input class="form-control" type="text" name="tipo_estado2" value="<?php $resultado->tipo_estado; ?>" required>
			</div>

<br>
				
					<input type="hidden" name="oculto">
					<input class="btn btn-primary" type="submit" name="editar" value="Editar"> 
					<a type="submit" class="btn btn-danger"  href="estado.php">Cancelar</a>
		

				
			</form>

</div>
				<?php 

include 'C:/xampp/htdocs/lion_group_system/AUXILIAR ADMINISTRATIVO/principal/vistas/pagina_inferior.php';  	

 ?>