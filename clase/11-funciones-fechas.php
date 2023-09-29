<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Funciones para fechas en PHP</title>
</head>
<body>
	<h1>Funciones para tratamiento de fechas en PHP</h1>
	

<?php 
	setlocale(LC_ALL , "es");
	echo "<br>Función time() -> timestamp:".time();
	//crear el timestamp del 30 de enero de 2000 a las 10:30:00 h

	$instante=mktime(10,30,00,1,30,2000);

	echo "<br>timestamp del 30 de enero de 2000 a las 10:30:00 h : $instante";

	echo strftime("<p>el 30/01/2000 fue %A,</p>",$instante);


	echo strftime("<p>Hoy es %A, %e de %B de %Y y son las %T</p>");




?>	
</body>
</html>