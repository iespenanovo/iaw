<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ficheros</title>
</head>
<body>
	<h1>Leer fichero csv desde PHP</h1>

<?php 
	$fichero="doc/datos1.csv";
	//abrimos fichero para solo lectura, controlando posible error 
	$cursor=@fopen($fichero, 'r') or die ("<p>Error al abrir el $fichero </p>");

	$linea=fgets($cursor);
	$nRegistros=0;
	while (!feof($cursor)) {
		$nRegistros++;
		//echo "<br>$nRegistros ---> $linea";
		$campos=explode(";", $linea);
		list($nombre,$edad,$dni,$poblacion)=$campos;
		//echo "<p>$campos[0] - $campos[1] - $campos[2] - $campos[3] </p>";
		echo "<p>$nombre - $edad - $dni - $poblacion</p>";

		$linea=fgets($cursor);
	}

	fclose($cursor);//cerramos fichero

?>
</body>
</html>