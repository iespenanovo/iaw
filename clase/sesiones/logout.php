<?php
	session_start();
	//para cerrar sesión , borramos todas los datos del array $_SESSION

	//$_SESSION=[];//con esta sentencia se eliminan todas las variables de sesión
	session_destroy();
	header("Location:login.php");//redirigimos al script de inicio de control de sesiones
	exit();
?>