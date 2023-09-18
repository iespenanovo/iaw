<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ámbito variables en PHP</title>
</head>
<body>

	<h1>Ámbito variables en PHP</h1>

<?php 
$a="hola"; //variable global

function saludo() {
	$b="adiós"; //variable local da función 'saludo';
	echo "<p>Saludo: $a</p>"; //$a non visible en ámbito de función (local)
	echo "<p>Despedida: $b</p>";
}

saludo();
echo "<p>Saludo: $a</p>";
echo "<p>Despedida: $b</p>"; //$b non visible en ámbito global,


?>	

	<h2>Constantes en PHP</h2>

<?php 
	//definición de constantes:
	define(EURO, 166.386);
	$cantidadEuros=60;
	$cantidadPts=$cantidadEuros*EURO;
	echo "<p>$cantidadEuros € son $cantidadPts pts</p>";


?>	
	
</body>
</html>