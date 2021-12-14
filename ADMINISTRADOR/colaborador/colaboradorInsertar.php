<?php 

session_start();
	if (!isset($_SESSION['nombre'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre'])){	
	
 include 'C:/xampp/htdocs/lion_group_system/ADMINISTRADOR/eps/vistas/pagina_superior.php';  
	include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
	$sentencia = $bd->query("SELECT * FROM colaborador INNER JOIN tipo_documento ON colaborador.id_tipo_documento = tipo_documento.id_tipo_documento INNER JOIN tipo_colaborador ON colaborador.id_tipo_colaborador = tipo_colaborador.id_tipo_colaborador INNER JOIN estado ON colaborador.id_estado = estado.id_estado");
	$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

	}else{
		echo 'error en el sistema';
	}
 ?>

<!-- inicio insert -->



<div class="container px-4">
			<h1 class="mt-4 ">Colaborador</h1>
			<h5 class="text-secondary mt-2">Insertar colaborador</h5>

			<div class="container px-4 border border-secondary shadow p-3 mb-5 bg-white rounded">
				<h4>Ingresa los datos del nuevo colaborador</h4>
				<form method="POST" action="insertar.php">

			<div class="row">

				<div class="form-group col-md-4">
				<label class="col-sm-6 col-form-label" >ID Colaborador*</label>
				<input class="form-control" type="text" name="id_colaborador" required>
				</div>
				<div class="form-group col-md-4">
				<label class="col-sm-6 col-form-label" >Tipo de documento*</label>
					<select class="form-control" name="id_tipo_documento" required>
						<option value="">Tipo de documento</option>
                        <?php 
                        $sentencia = $bd->query("SELECT * FROM tipo_documento");
						$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

                        foreach ($datos as $dato) {
                            echo "<option value=".$dato->id_tipo_documento.">".$dato->tipo_documento."</option>";
                        } ?>
                 </select>
				</div>
				<div class="form-group col-md-4">
				<label class="col-sm-6 col-form-label" >Numero Documento*</label>
					<input class="form-control" type="text" name="documento" required>
				</div>
			</div>

			<div class="row">

				<div class="form-group col-md-4">
				<label class="col-sm-6 col-form-label" >Nombres*</label>
					<input class="form-control" type="text" name="nombre" required>
				</div>
				<div class="form-group col-md-4">
				<label class="col-sm-6 col-form-label" >Apellidos*</label>
					<input class="form-control" type="text" name="apellidos" required>
				</div>
				<div class="form-group col-md-4">
				<label class="col-sm-6 col-form-label" >Tipo de colabarodor*</label>
					<select class="form-control" name="id_tipo_colaborador" required>
						<option value="">Tipo de colaborador</option>
                        <?php 
                        $sentencia = $bd->query("SELECT * FROM tipo_colaborador");
						$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

                        foreach ($datos as $dato) {
                            echo "<option value=".$dato->id_tipo_colaborador.">".$dato->tipo_colaborador."</option>";
                        } ?>
                 </select>
				</div>
			</div>

			<div class="row">

				<div class="form-group col-md-4"> 
				<label class="col-sm-6 col-form-label" >Telefono*</label>
					<input class="form-control" type="text" name="telefono" required>
				</div>
				<div class="form-group col-md-4">
				<label class="col-sm-6 col-form-label" >Correo*</label>
					<input class="form-control" type="text" name="correo" required>
					</div>
				<div class="form-group col-md-4">
				<label class="col-sm-6 col-form-label" >Estado*</label>
					<select class="form-control" name="id_estado" required>
						<option value="">Tipo de estado</option>
                        <?php 
                        $sentencia = $bd->query("SELECT * FROM estado");
						$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

                        foreach ($datos as $dato) {
                            echo "<option value=".$dato->id_estado.">".$dato->tipo_estado."</option>";
                        } ?>
                 </select>
				</div>
			</div>

				<div class="row">

				<div class="form-group col-md-6">
				<label class="col-sm-6 col-form-label" >Usuario*</label>
					<input class="form-control" type="text" name="usuario" required>
				</div>
					<div class="form-group col-md-6">
					<label class="col-sm-6 col-form-label" >Contraseña*</label>
					<input class="form-control" type="text" name="contraseña" required>
				</div>
				</div>


					<br>		
				<input type="hidden" name="oculto" value="1">
				<a type="submit" class="btn btn-danger" href="colaborador.php">Cancelar</a>
     <input class="btn btn-primary" type="submit" value="Aceptar">
     <input class="btn btn-outline-secondary" type="reset" name="">
				

			

			</form>
			</div>


			</div>
			<!-- fin insert -->



<?php 

include 'C:/xampp/htdocs/lion_group_system/ADMINISTRADOR/eps/vistas/pagina_inferior.php';

 ?>