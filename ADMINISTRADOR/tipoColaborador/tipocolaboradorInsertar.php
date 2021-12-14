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


			<!-- inicio insert -->


			<div class="container px-4">
			<h1 class="mt-4 ">Tipo Colaborador</h1>
			<h5 class="text-secondary mt-2">Insertar Tipo Colaborador</h5>

			<div class="container px-4 border border-secondary shadow p-3 mb-5 bg-white rounded">
			<h4>Ingresa los datos del nuevo tipo de colaborador</h4>
			<form method="POST" action="insertar.php">

			<div>
				<div>
				<label class="col-sm-6 col-form-label" >ID Tipo Colaborador*</label>
				<input class="form-control" type="text" name="id_tipo_colaborador" placeholder="ID Tipo Colaborador" required>
				</div>
				<div>
				<label class="col-sm-6 col-form-label" >Tipo De Colaborador*</label>
				<input class="form-control" type="text" name="tipo_colaborador" placeholder="Tipo Colaborador" required>
				
				</div>
				<div>
				<label class="col-sm-6 col-form-label" >Funcion*</label>
					<td><input class="form-control" type="text" name="funcion" placeholder="Funcion" required></td>
				</div>
			

			</div>
			<br>		
				<input type="hidden" name="oculto" value="1">
				<a type="submit" class="btn btn-danger" href="tipocolaborador.php">Cancelar</a>
     <input class="btn btn-primary" type="submit" value="Aceptar">
     <input class="btn btn-outline-secondary" type="reset" name="">

			
				
			</form>
			</div>

			</div>



			<!-- fin insert -->


<?php 

include 'C:/xampp/htdocs/lion_group_system/ADMINISTRADOR/eps/vistas/pagina_inferior.php';

 ?>