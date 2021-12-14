<?php 
	session_start();
	session_destroy();
	
		echo '<script>';
			echo 'alert("Deslogeado!!");';
			echo 'window.location.href="login.php";';
		echo '</script>';

 ?>