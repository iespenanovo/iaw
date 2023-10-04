<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ficheros</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
	<div class="container">
	<h1 class="text-center">Leer fichero csv desde PHP</h1>
	<table class="table table-dark table-striped">
		
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

		echo "\n<tr>";
		echo "\n\t<td>$nRegistros</td>";
		echo "\n\t<td>$nombre</td>";
		echo "\n\t<td>$edad</td>";
		echo "\n\t<td>$dni</td>";
		echo "\n\t<td>$poblacion</td>";
		echo "\n</tr>";

		$linea=fgets($cursor);
	}

	fclose($cursor);//cerramos fichero

?>
	</table>
	</div>
	

</body>
</html>