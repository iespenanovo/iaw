<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Estructuras de control</title>
</head>
<body>
	<h1>Estructuras de control</h1>
	<h3>if, if else , if elseif else</h3>

<?php 
    $a=10; $b=20; $c=30;
    echo "<br>Variables a , b , c :<br>";
    echo var_dump($a, $b, $c);
	if ( $a <= $c ) {
		echo "<br> se cumple : $a <= $c ";
	}

	if ( $a >= $c ) {
		echo "<br> se cumple : $a >= $c ";
	} else {
		echo "<br> No se cumple : $a >= $c ";
	}

	if ($b<0) {
		echo "<br>se cumple : $b<0";
	} elseif ($b<=5) {
		echo "<br>$b está entre 0 y 5";
	} elseif ($b<=25) {
		echo "<br>$b es >5 y <=25";
	} else {
		echo "<br>$b es >25";
	}


 ?>	
</body>
</html>