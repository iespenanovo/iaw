<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bases de datos desde PHP</title>
</head>
<body>
	<h1>Bases de datos desde PHP</h1>

<?php 

	//nos conectamos al servidor de bases de datos

	//$c=mysqli_connect("localhost", "root", ""   ,"",       3306);
	//                   servidor  user   passw  baseDatos, puerto(por defecto el 3306) 

	//es más práctico tener los datos de conexión en un único archivo
	require 'datos-conexion-BD.php';
	$c=@mysqli_connect($BD_servidor,$DB_usuario,$BD_clave,$DB_baseDatos,$DB_puerto) or die("<p>Error conectando con el servidor de bases de datos $BD_servidor</p>");

?>	
</body>
</html>