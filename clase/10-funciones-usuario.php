<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Funciones en PHP</title>
</head>
<body>
	<h1>Funciones en PHP definidas por el usuario</h1>
<?php 
function saludo()
{
	echo "<p>Hola</p>";
}

function saludoPersonalizado($frase)
{
	echo "<p>$frase</p>";
}

function suma($n1,$n2)
{
	$resultado=$n1+$n2;
	return $resultado; //termina la función y devuelve a quien llamó el valor de $resultado

}

function saludo2($frase='Buensos días, ¿ qué tal ?')
{
	echo "<p>$frase</p>";
}

function sumaVariable() //pretende sumar todos los parámetros que le pasen, 1, 2 , 3 ...
{
	$suma=0;
	$parametros=func_get_args();//devuelve los parámetros enviados a la función en un array
	foreach ($parametros as $posicion => $valorParametro) {
		echo "<br>Parámetro $posicion : $valorParametro";
		$suma+=$valorParametro;
	}
	return $suma;
}

saludo();
saludo();
saludoPersonalizado("Buenos días");
$saludo1="Buenos días";
$saludo2="Buenas tardes";
saludoPersonalizado($saludo2);//paso de parámetro por valor
saludoPersonalizado($saludo2);//paso de parámetro por referencia

$numero1=5;
$numero2=4;

$resultadoSuma=suma($numero1,$numero2);
echo "<br>\$numero1,\$numero2,\$resultadoSuma:";
echo var_dump($numero1,$numero2,$resultadoSuma);

saludo2();//se puede dejar sin parámetro, puesto que tiene un valor por defecto en la función
saludo2($saludo2);

$sumaTotal=sumaVariable(1,2,3,4,10);
echo "<p>suma de sumaVariable(1,2,3,4,10) -> $sumaTotal </p>";
$sumaTotal=sumaVariable(10,20,30);
echo "<p>suma de sumaVariable(10,20,30) -> $sumaTotal </p>";
$sumaTotal=sumaVariable();
echo "<p>suma de sumaVariable() -> $sumaTotal </p>";





?>
</body>
</html>