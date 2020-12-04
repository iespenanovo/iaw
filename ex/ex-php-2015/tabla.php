<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Lista de libros</title>
	<style>
		.nombre {text-align: center; border:5px dashed red; width: 900px; margin: auto;padding: 10px; color:blue;}
		body {background-color: #ccc;}
		table {width: 70%;margin: 30px auto;background-color: #003484;border-spacing: 2px;}
		#encabezado th {color: white;font-size: 1.5em;}
		td, th {padding: 5px;}
		
		/* Pon a partir de aquí tu código CSS: */

		.color1 {background-color: #fff;}
		.color2 {background-color: #ddd;}
		.centro {text-align: center;}

	</style>
</head>

<body>
<h1 class="nombre">Pon aquí tu nombre y apellidos</h1>
<table>
<caption><b style='font-size:20pt'>Listado de libros de informática</b></caption>
<tr id="encabezado">
	<th>Nº</th>
	<th>Título</th>
	<th>Autor</th>
	<th>Editorial</th>
	<th>ISBN</th>
</tr>

<?php
$f1="tabla.txt";	// lo busca en el directorio actual
$id=@fopen($f1,"r") or die("El fichero $f1 no se ha podido abrir.");
$reg=fgets($id);
$c1="color1";
$numero=1;
while (!feof($id)) {
	$campos=explode("\t",$reg);
	echo "\n<tr class='$c1'>";

	echo "\n\t<td class='centro'>$numero</td>";
	echo "\n\t<td>$campos[0]</td>";
	echo "\n\t<td>$campos[1]</td>";
	echo "\n\t<td>$campos[2]</td>";
	echo "\n\t<td>$campos[3]</td>";

	echo "\n</tr>\n";

	$c1=$c1=="color1"?"color2":"color1";
	$numero++;

	$reg=fgets($id);
}
fclose($id);
?>

</table>

</body>
</html>
