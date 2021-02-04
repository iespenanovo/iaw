<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Base de datos MySql</title>
</head>
<body>
<?php
require("datos-conexion-mysql.php");
$id=mysqli_connect($servidor,$usuario,$clave,"",$puerto) or 
	die ("Error al intentar conectar con el servidor MySql Localhost");

echo "<p>Se estableció conexión con Localhost</p>";

$bd="iaw2014";
$sql="CREATE DATABASE IF NOT EXISTS $bd";

$result=@mysqli_query($id,$sql) 
	or die ("<p>Error al crear la base de datos $bd: ".mysqli_error($id)."</p>");

echo "<p>La base de datos $bd se creó con éxito o ya existe</p>";

$result=@mysqli_select_db($id,$bd) 
	or die ("<p>Error seleccionar la base de datos $bd: ".mysqli_error($id)."</p>");

echo "<p>La base de datos $bd se ha seleccionado correctamente</p>";

$sql="CREATE TABLE IF NOT EXISTS alumnos2 (
		nalum INT NOT NULL AUTO_INCREMENT,
		ape1 CHAR(50),
		ape2 CHAR(50),
		nom CHAR(50),
		sexo CHAR(1),
		codnac CHAR(3),
		nac CHAR(50),
		codcon CHAR(5),
		con CHAR(50),
		cp CHAR(5),
		codcur CHAR(6),
		cur CHAR(50),
		gr CHAR(1),
		codens CHAR(2),
		ens CHAR(50),
		PRIMARY KEY (nalum)
	  );";

$result=@mysqli_query($id,$sql) 
	or die ("<p>Error al ejecutar la sentencia sql $sql: ".mysqli_error($id)."</p>");

echo "<p>La tabla alumnos2 fue creada con éxito o ya existe</p>";


	$numreg=0;
	$fichero="alumnos-ejemplo.csv";
	$idf=@fopen($fichero, "r") or // abrimos para lectura secuencial
		die ("Error al intentar abrir el fichero $fichero");
	$reg=fgets($idf); //lee la primera linea del fichero, línea completa
	$reg=fgets($idf); //lee la primera linea del fichero, línea completa
	while (!feof($idf)) {
		$datos=explode(";", $reg); //pasa a array los datos de un alumno
		// $datos[0]=nombre, $datos[1]=apellidos, ...

		$sql="INSERT INTO alumnos2 VALUES
		(NULL,'$datos[0]','$datos[1]','$datos[2]','$datos[3]',
			'$datos[4]','$datos[5]','$datos[6]','$datos[7]',
			'$datos[8]','$datos[9]','$datos[10]','$datos[11]',
			'$datos[12]','$datos[13]');";

		$result=@mysqli_query($id,$sql) 
		or die ("<p>Error al ejecutar la sentencia sql $sql: ".mysqli_error($id)."</p>");

		$numreg++;
		//echo "$numreg<br>";
		$reg=fgets($idf); // leemos siguiente línea de datos (o fin de fichero)
	}

	fclose($idf); //cerramos el fichero
	
	echo "Proceso de importación finalizado";




echo "<p>Se añadieron con éxito $numreg registros a la tabla alumnos</p>";

//leer registros con sentencias SELECT

$sql="SELECT * FROM alumnos2";
$result=@mysqli_query($id,$sql) 
	or die ("<p>Error al ejecutar la sentencia sql $sql: ".mysqli_error($id)."</p>");
$nfilas=mysqli_num_rows($result); //devuelve número de registros de la select
$ncampos=mysqli_num_fields($result); //devuelve número de campos de la select

echo "<p>La sentencia SQL <b>$sql</b> devuelve $nfilas filas y $ncampos campos</p>";
echo "<h1>Lectura resultado SELECT con mysqli_fetch_array(result)</h1>";

while($fila=mysqli_fetch_array($result)) { 
	// cada vez lee una fila de la SELECT, si no hay, devuelve False
	echo "<br>
		{$fila['nalum']} - 
		{$fila[1]} - 
		{$fila[02]} - 
		{$fila[03]} - 
		{$fila[04]} - 
		{$fila[05]} - 
		{$fila[06]} - 
		{$fila[07]} - 
		
";
}

@mysqli_close($id); //cerramos conexión $id con servidor de base de datos

?>
	
</body>
</html>