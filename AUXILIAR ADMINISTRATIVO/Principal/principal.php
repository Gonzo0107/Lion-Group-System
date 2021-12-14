<?php 
session_start();
    if (!isset($_SESSION['nombre2'])) {
        header('location: http://localhost/lion_group_system/login/login.php');
    }elseif(isset($_SESSION['nombre2'])){  
		include 'C:/xampp/htdocs/lion_group_system/AUXILIAR ADMINISTRATIVO/principal/vistas/pagina_superior.php'; 

  	}else{
        echo 'error en el sistema';
    }


 ?>

<!-- inicio -->



 <div class="container px-4 row">
<h1 class="mt-4  ">Inicio: Auxiliar Aministrativo</h1>

<div class="container border border-light shadow-lg p-4 col-sm-3 mt-4 bg-white "> 
<i class="far fa-clipboard fa-2x"></i>
<h3>Ver Novedades </h3>
<h5 class="text-secondary ">Click aqui </h5>
</div>

<div class="container border border-light shadow-lg p-4 col-sm-3 mt-4 bg-white "> 
<i class="far fa-clipboard fa-2x"></i>
<h3>Ver Comisiones </h3>
<h5 class="text-secondary ">Click aqui </h5>
</div>

</div>
	
<!-- fin -->




<?php 

include 'C:/xampp/htdocs/lion_group_system/ASESOR DE VENTAS/principal/vistas/pagina_inferior.php'; 

 ?>