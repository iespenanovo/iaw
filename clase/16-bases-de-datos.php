<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bases de datos desde PHP</title>
	<style>
		.error {
			color: red;
		}
	</style>
</head>
<body>
	<h1>Bases de datos desde PHP</h1>

<?php 

	//nos conectamos al servidor de bases de datos

	//$c=mysqli_connect("localhost", "root", ""   ,"",       3306);
	//                   servidor  user   passw  baseDatos, puerto(por defecto el 3306) 

	//es más práctico tener los datos de conexión en un único archivo
	require 'datos-conexion-BD.php';
	$c=@mysqli_connect($BD_servidor,$BD_usuario,$BD_clave,$BD_baseDatos,$BD_puerto) or die("<p>Error conectando con el servidor de bases de datos $BD_servidor</p>");

	$BD_baseDatos="iaw-23-24";
	$SQL="CREATE DATABASE IF NOT EXISTS `$BD_baseDatos` COLLATE 'utf8_general_ci'";

    echo "<p>$SQL</p>";

    consultaSQL($c,$SQL);

    echo "<p>se creó la base de datos $BD_baseDatos</p>";

    @mysqli_select_db($c,$BD_baseDatos) or die("<p class='error'>Error al seleccionar la base de datos $BD_baseDatos</p>") ;

    echo "<p>Se ha seleccionado la base de datos $BD_baseDatos</p>";

    $SQL="SET NAMES 'utf8'";
    echo "<p>$SQL</p>";
    consultaSQL($c,$SQL);
	$SQL="CREATE TABLE IF NOT EXISTS alumnos 
	(
		id			INT UNSIGNED NOT NULL AUTO_INCREMENT,
		nombre		CHAR(40),
		nif 		CHAR(9),
		clave		CHAR(100),
		sexo 		CHAR(1),
		deportes 	CHAR(6),
		provincia	CHAR(2),
		so 			CHAR(30),
		comentario	TEXT,
		PRIMARY KEY (id),
		UNIQUE KEY  (nif)
	);
	";    

?>	
</body>
</html>