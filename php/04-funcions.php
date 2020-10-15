<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Funcións</title>
	<style>
		table, th, td {
			border: 1px solid blue;
		}
	</style>
</head>
<body>
	<h1>Funcións en PHP</h1>
<?php 
	function suma($n1,$n2)
	{
		return $n1+$n2;
	}

	function suma2($n1=0,$n2=0,$n3=0,$n4=0,$n5=0)
	{
		return $n1+$n2+$n3+$n4+$n5;
	}

	function suma3()
	{
		$numeros=func_get_args();
		$suma=0;
		echo "<p>";
		foreach ($numeros as $key => $value) {
			$suma+=$value;
			echo $key>0 ? " + ":"";
			echo "$value";
		}
		echo " = $suma";
		echo "</p>";
		return $suma;
	}

	function cafe($tipo, $temperatura="quente", $azucar="si")
	{
		# code...
	}
	//se un parámetro é opcional , deben ser tamén os seguintes

	$resultado=suma(5,6);
	echo "<p>suma(5,6): $resultado</p>";
	$resultado=suma2();
	echo "<p>suma(): $resultado</p>";
	$resultado=suma2(5);
	echo "<p>suma(5): $resultado</p>";
	$resultado=suma2(5,7);
	echo "<p>suma(5,7): $resultado</p>";
	$resultado=suma2(5,7,1);
	echo "<p>suma(5,7,1): $resultado</p>";
	$resultado=suma2(1,1,1,1,1,1);
	echo "<p>suma(1,1,1,1,1,1): $resultado</p>";

	$resultado=suma3(1,1,1,1,1,1);
	echo "<p>suma3(1,1,1,1,1,1): $resultado</p>";

	$resultado=suma3(1,2,3,4,5,6,7,8,9,10);
	echo "<p>suma3(1,2,3,4,5,6,7,8,9,10): $resultado</p>";


?>		
	<h2>función explode() e implode() de php</h2>

<?php 
	$cadea1="nome;apelidos;teléfono;poboación;curso";
	$cadea2="Pedro;Campos Díaz;666777888;Vilalba;ASIR2";

	$campos1=explode(";", $cadea1);
	$campos2=explode(";", $cadea2);

	echo "<p>$cadea1<br>";
	echo print_r($campos1);
	echo "</p>";

	echo "<p>$cadea2<br>";
	echo print_r($campos2);
	echo "</p>";

	echo "\n<table>";
	echo "\n\t<tr>";
	foreach ($campos1 as $value) {
		echo "\n\t\t<th>$value</th>";
	}
	echo "\n\t</tr>";
	echo "\n\t<tr>";
	foreach ($campos2 as $value) {
		echo "\n\t\t<td>$value</td>";
	}
	echo "\n\t</tr>";

	echo "\n</table>";


 ?>	

 


</body>
</html>