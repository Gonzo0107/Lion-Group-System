<?php 

session_start();
      
       if (!isset($_SESSION['nombre'])) {
        header('location: http://localhost/lion_group_system/login/login.php');
    }elseif(isset($_SESSION['nombre'])){ 


    include 'C:/xampp/htdocs/lion_group_system/ADMINISTRADOR/eps/vistas/pagina_superior.php';    
    include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
    $sentencia = $bd->query("SELECT * FROM eps INNER JOIN estado ON eps.id_estado = estado.id_estado");
    $datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

    

    }else{
        echo 'error en el sistema';
    }



 ?>

<div class="container px-4">
<h1 class="mt-4 ">EPS</h1>
<h5 class="text-secondary mt-2">Insertar nueva EPS</h5>


		<div class="container px-4 border border-secondary shadow p-3 mb-5 bg-white rounded">

			<h4>Ingresa los datos de la nueva eps</h4>
			<form method="POST" action="insertar.php">

			  <div class="row">
    			<div class="form-group col-md-4">
					<label class="col-sm-2 col-form-label" >Id eps</label>
					<input  class="form-control" type="text" name="id_eps" required>
				</div>
		
				<div class="form-group col-md-4">
					<label class="col-sm-4 col-form-label" >Nombre EPS</label>
					<input class="form-control" type="text" name="nombre_eps" required>
				</div>
			
				<div class="form-group col-md-4">
					<label class="col-sm-4 col-form-label" >Numero nit</label>
					<input class="form-control" type="text" name="numero_nit" required>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-6">
					<label class="col-sm-2 col-form-label" >Telefono</label>
					<input class="form-control" type="text" name="telefono" required>
				</div>
				<div class="form-group col-md-6">
					<label class="col-sm-2 col-form-label" >Direccion</label>
					<input class="form-control" type="text" name="direccion" required>
				</div>
			</div>
				<div class="row">
					<div class="form-group col-md-4">
					<label class="col-sm-2 col-form-label" >Estado</label>
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

				<br>
				<input type="hidden" name="oculto" value="1">
				
					<input class="btn btn-outline-secondary" type="reset" name="">
					<input class="btn btn-primary" type="submit" value="Aceptar">
					<a type="submit" class="btn btn-danger"  href="eps.php">Cancelar<a>
			

		
				
			</form>
			</div>

<?php 

include 'C:/xampp/htdocs/lion_group_system/ADMINISTRADOR/eps/vistas/pagina_inferior.php';

 ?>