<?php 

session_start();
	if (!isset($_SESSION['nombre2'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre2'])){	
		
include 'C:/xampp/htdocs/lion_group_system/AUXILIAR ADMINISTRATIVO/principal/vistas/pagina_superior.php';  	
include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';
	$sentencia = $bd->query("SELECT * FROM reclamaciones INNER JOIN colaborador ON reclamaciones.id_colaborador = colaborador.id_colaborador");
	$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

	}else{
		echo 'error en el sistema';
	}

 ?>


			<!-- inicio insert -->


			<div class="container px-4">
			<h1 class="mt-4 ">Reclamacion</h1>	
			<h5 class="text-secondary mt-2">Insertar reclamacion</h5>

			<div class="container px-4 border border-secondary shadow p-3 mb-5 bg-white rounded">
			<h4>Ingresa los datos de la nueva reclamacion</h4>
			<form method="POST" action="insertar.php">
				
			<div class="row">
				<div>
				<label class="col-sm-6 col-form-label" >ID reclamacion*</label>
				<input class="form-control" type="text" name="id_reclamaciones" placeholder="ID reclamacion" required>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-6">
				<label class="col-sm-6 col-form-label" >Colaborador*</label>
					<select class="form-control" name="id_colaborador" required>
						<option value="">Colaborador</option>
                        <?php 
                        $sentencia = $bd->query("SELECT * FROM colaborador");
						$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

                        foreach ($datos as $dato) {
                            echo "<option value=".$dato->id_colaborador.">".$dato->nombre."</option>";
                        } ?>
                 </select>
				</div>
				<div class="form-group col-md-6">
				<label class="col-sm-6 col-form-label" >Fecha de radicacion*</label>
					<input class="form-control" type="date" name="fecha_reclamacion" placeholder="fecha_reclamacion" required>
				</div>
				</div>
				<div class="row">
				<div>
				<label class="col-sm-6 col-form-label" >Descripcion*</label>
					<textarea class="form-control" name="descripcion" rows="5" cols="25" required></textarea>
				</div>
				</div>
				
				
				<br>		
				<input type="hidden" name="oculto" value="1">
				<a type="submit" class="btn btn-danger" href="reclamaciones.php">Cancelar</a>
     <input class="btn btn-primary" type="submit" value="Aceptar">
     <input class="btn btn-outline-secondary" type="reset" name="">
			

			
				
			</form>

			</div>

			</div>

			<!-- fin insert -->

<?php 
include 'C:/xampp/htdocs/lion_group_system/AUXILIAR ADMINISTRATIVO/principal/vistas/pagina_inferior.php';  	

 ?>