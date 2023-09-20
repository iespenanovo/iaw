<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Operadores en PHP</title>
	<link rel="stylesheet" href="css/06-estilo.css">
</head>

<body>
	<h1>Operadores en PHP</h1>
	<h3>Operadores aritméticos: + - * / %</h3>

<?php 
	$a = 1;
	$b = 2;
	$c = 5;

	$d = $a + $b - $c;
    
	echo "variables a b c d:";
	echo var_dump($a,$b,$c,$d);
    

    echo "<br>d = c % b";
	$d = $c % $b;
	echo "<br>variables d, después de operador módulo (%):<br>";
	echo var_dump($d);
?>	
	<h3>Operadores de asignación: = += -= *= /= .= ...</h3>
<?php 
	$a = 100;
	$b = 200;
	$c = 500;
	echo "<br>variables a b c :<br>";
	echo var_dump($a,$b,$c);
	
	$a += $b + 1 ;
	
	echo "<br>\$a += $b + 1 ; :<br>";
	echo "<br>variables a b c :<br>";
	echo var_dump($a,$b,$c);

	$nombre="Juan";

	echo "<br><br>variable nombre :<br>";
	echo var_dump($nombre);

	$nombre.=" Díaz";

	echo "<br>\$nombre.=' Díaz'";
	echo "<br>variable nombre :<br>";
	echo var_dump($nombre);
 ?>
 	<h3>Operadores de comparación ==, !=, <, >, <= y >=</h3>

<?php 
	echo "<br>variables a b c :<br>";
	echo var_dump($a,$b,$c);

	if ($a > $b) {
		echo "<br>se cumple que: $a > $b";
	} else {
		echo "<br>NO se cumple que: $a > $b";
	}
	
	if ($b > $a) {
		echo "<br>se cumple que: $b > $a";
	} else {
		echo "<br>NO se cumple que: $b > $a";
	}
	
	if ($b == 200) {
		echo "<br>se cumple que: $b == 200";
	} else {
		echo "<br>NO se cumple que: $b == 200";
	}

	if ($b != $c) {
		echo "<br>se cumple que: $b != $c";
	} else {
		echo "<br>NO se cumple que: $b != $c";
	}	


?>
	<h3>Operador ternario (expr1) ? (expr2) : (expr3)</h3>

<?php 
	echo "<br>variables a b c :<br>";
	echo var_dump($a,$b,$c);

	$a = ($b==$c) ? 100 : 150 ;

	//la línea anterior equivale a:
	/*
	if ($b==$c) {
		$a=100;
	} else {
		$b=150;
	}
	*/

	echo "<br>\$a = ($b==$c) ? 100 : 150 ";
	echo "<br>variables a b c :<br>";
	echo var_dump($a,$b,$c);

	//vamos con un ejemplo de uso de operador ternario para alternancia de colores con clases css

	$color="rojo";

	$meses = array("ene","feb","mar","abr","may","jun");
	//               0     1     2     3     4     5

	echo "\n<ol>";
	$clase="rojo";
	foreach ($meses as $indice => $valor) {
		echo "\n\t<li class='$clase'>$valor</li>";
		$clase = ($clase == "rojo") ? "azul" : "rojo" ;
	}
	echo "\n</ol>";

 ?>	

 	<h3>Operadores de incremento y decremento ++ --</h3>
<?php 
	echo "<br>variables a b c :<br>";
	echo var_dump($a,$b,$c);

	$a++; //incrementa en una unidad, equivale a $a = $a + 1; también valdría $a+=1;
	$b--; //decrementa en una unidad, equivale a $b = $b - 1; también valdría $b-=1;
	++$c;

	echo "<br>\$a++; \$b--; ++\$c;";
	echo "<br>variables a b c :<br>";
	echo var_dump($a,$b,$c);

	$c = $b++ * 2;

	echo "<br>\$c = \$b++ * 2;";
	echo "<br>variables a b c :<br>";
	echo var_dump($a,$b,$c);

	$b=199;
	$c=501;
	echo "<br>variables a b c :<br>";
	echo var_dump($a,$b,$c);

	$c = ++$b * 2;

	echo "<br>\$c = ++\$b * 2;";
	echo "<br>variables a b c :<br>";
	echo var_dump($a,$b,$c);

?> 	
	<h3>Operadores lógicos :Y lógico: && o and , O lógico: || o or, O exclusivo: xor, NO lógico: ! </h3>

<?php 
	
	if ( ($b > $a) and ($b > $c) ) {
		echo "<br>Se cumple : ($b > $a) and ($b > $c)";
	} else {
		echo "<br>No se cumple : ($b > $a) and ($b > $c)";	
	}
	
	if ( ($b > $a) or ($b > $c) ) {
		echo "<br>Se cumple : ($b > $a) or ($b > $c)";
	} else {
		echo "<br>No se cumple : ($b > $a) or ($b > $c)";	
	}

	if ( ($b > $a) and !($b > $c) ) {
		echo "<br>Se cumple : ($b > $a) and !($b > $c)";
	} else {
		echo "<br>No se cumple : ($b > $a) and !($b > $c)";	
	}
		
?>	

	<h3>Operador de cadenas .</h3>

<?php 

  $nombre="Juan";
  $apellido="Díaz";  
  echo "<br>variables nombre apellido  :<br>";
  echo var_dump($nombre,$apellido);

  echo "<br>" . $nombre . " " . $apellido ;


?>	
</body>
</html>