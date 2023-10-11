<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bases de datos desde PHP</title>
	<style>
		.error {color: red;}
		.ok {color: green;}
	</style>
</head>
<body>
	<div class="contenedor">
		
		<h1> Bases de datos en PHP </h1>

<?php
	function enviarConsultaBD($idCon,$SQL)	{
		$resultado=@mysqli_query($idCon,$SQL) or die("<p class='error'>Error sentencia SQL :<strong>$SQL</strong>
								<br>Error Nº:".mysqli_errno($idCon).
								"<br>Descripción error:".mysqli_error($idCon).
								"</p>");
		return $resultado;
		
	}


	//require 'datos-conexion-BD.php';
	$BD_servidor="localhost";
	$BD_usuario="root";
	$BD_clave="";//password del usuario $DB_usuario
	$BD_baseDatos="iaw-23-24";
	$BD_puerto=3306;
	//$c=mysqli_connect("localhost","root",    ""  ,""       , 3306);
	//                   servidor  usuario  passw baseDatos, puerto
	//mejor usamos los parámetros tomados de un archivo , es más fácil de mantener
	$c=@mysqli_connect($BD_servidor,$BD_usuario,$BD_clave,"",$BD_puerto) or die("<p class='error'>Error conectando con el servidor de bases de datos $BD_servidor</p>"); 
	//en el parámetro de la base de datos ponemos "" solo porque este es el script de creación de la base de datos. Si ponemos un base de datos y esta no existe, no se produce la conexión.

	echo "<p class='ok'>Conexión con el servidor de base de datos $BD_servidor establecida con éxito</p>";

	//$BD_baseDatos="iaw22-23";
	$sql="CREATE DATABASE IF NOT EXISTS `$BD_baseDatos` COLLATE 'utf8_general_ci'";
	//$sql="CREATE DATABASE `$BD_baseDatos` COLLATE 'utf8_general_ci'";


	echo "<p>$sql</p>";

	enviarConsultaBD($c,$sql);
	
	//var_dump(mysqli_error($c));
	//var_dump(mysqli_errno($c));

	echo "<p class='ok'>Se creó la base de datos $BD_baseDatos con éxito (sino existía)</p>";

	//vamos ahora a seleccionar la base datos
	@mysqli_select_db($c,$BD_baseDatos) or die ("<p>Error al seleccionar la base de datos $BD_baseDatos
								<br>Error Nº:".mysqli_errno($c).
								"<br>Descripción error:".mysqli_error($c).
								"</p>");

	echo "<p class='ok'>Se seleccionó la base de datos $BD_baseDatos</p>";


	//vamos a establecer la codificación de caracteres UTF-8
	$sql="SET NAMES 'utf8'";
	echo "<p>$sql</p>";

	
	enviarConsultaBD($c,$sql);

	echo "<p class='ok'>Codificación UTF-8 establecida</p>";


	//vamos a crear una tabla

	$sql="CREATE TABLE IF NOT EXISTS alumnos 
	(
		id			INT UNSIGNED NOT NULL AUTO_INCREMENT,
		nombre		CHAR(40),
		nif 		CHAR(9),
		clave		CHAR(100),
		sexo 		CHAR(1),
		deportes 	CHAR(6),
		provincia	CHAR(2),
		so 			CHAR(30),
		comentario	TEXT,
		PRIMARY KEY (id),
		UNIQUE KEY  (nif)
	);
	";
	echo "<p>$sql</p>";
	enviarConsultaBD($c,$sql);

	echo "<p class='ok'>Se creó la tabla alumnos con éxito (sino existía)</p>";

	$sql="TRUNCATE alumnos";//eliminamos todo el contenido de la tabla alumnos, para evitar duplicados de nif si se ejecuta este script repetidas veces. 
	echo "<p>$sql</p>";	
	enviarConsultaBD($c,$sql);

	echo "<p class='ok'>Se eliminaron los registros de la tabla alumnos (si existian)</p>";	

	$cadenaHash=hash('md5', 'abc123.');
	$sql="INSERT INTO `alumnos` (`nombre`, `nif`, `clave`, `sexo`, `deportes`, `provincia`, `so`, `comentario`) VALUES
	('Ana Díaz','12345678Z','$cadenaHash','M','N*B','LU','w10*LX','Preferencia nocturno'),
	('Luis Fernández','12345677J','".hash('md5','abc123.')."','H','F*B','CO','w10*LX','Preferencia diúrno'),
	('Gonzalo Abuín','12345676N','".hash('md5','abc123.')."','H','F*N','PO','w8*MOS',''),
	('Julia Moteagudo','12345675B','".hash('md5','abc123.')."','M','F*N*B','CO','w8*LX','Becario'),
	('César Ríos','12345674X','".hash('md5','abc123.')."','H','F*N','LU','w10','Preferencia nocturno')
	";


	echo "<p>$sql</p>";

	enviarConsultaBD($c,$sql);

	$numFilas=mysqli_affected_rows($c);
	echo "<p class='ok'>Se insertaron $numFilas registros en la tabla alumnos</p>";

	$sql="SELECT * FROM alumnos ORDER BY provincia,nombre";
	echo "<p>$sql</p>";

	$resultado=enviarConsultaBD($c,$sql);


	$numFilas=mysqli_num_rows($resultado);
	echo "<p>la sentencia devuelve $numFilas filas:</p>";
	while($fila=mysqli_fetch_row($resultado)){ 
		//$fila=mysqli_fetch_row($resultado), devuelve la siguiente fila de la select en un array standard (índices numéricos). Cuando no quedan filas, la expresión vale false, y vale true en caso contrario, es decir, cuando es capaz de devolver una fila
		//echo "<br>$fila[0] - $fila[1] - $fila[2] - $fila[3] - $fila[4] - $fila[5] - $fila[6] - $fila[7] - $fila[8]";
		//las dos siguientes sentencias equivalen a la anterior, más amigable
		list($id,$nombre,$nif,$clave,$sexo,$deportes,$provincia,$so,$comentario)=$fila;
		echo "<br>$id - $nombre - $nif - $clave - $sexo - $deportes - $provincia - $so - $comentario";

	}

	$sql="SELECT * FROM alumnos WHERE provincia='LU' OR provincia='CO' ORDER BY provincia DESC, nombre ASC";
	echo "<p>$sql</p>";

	$resultado=enviarConsultaBD($c,$sql);

	$numFilas=mysqli_num_rows($resultado);
	echo "<p>la sentencia devuelve $numFilas filas:</p>";
	while($fila=mysqli_fetch_array($resultado)){ //más amigable que fetch_row()
		//$fila=mysqli_fetch_array($resultado), devuelve la siguiente fila de la select en un array asociativo (índices son los nombres de los campos). Cuando no quedan filas, la expresión vale false, y vale true en caso contrario, es decir, cuando es capaz de devolver una fila
		echo "<br>{$fila['id']} - {$fila['nombre']} - {$fila['nif']} - {$fila['clave']} - {$fila['sexo']} - {$fila['deportes']} - {$fila['provincia']} - {$fila['so']} - {$fila['comentario']}";
	
	}

	$sql="DELETE FROM alumnos WHERE provincia='CO'";
	echo "<p>$sql</p>";
	enviarConsultaBD($c,$sql);

	$numFilas=mysqli_affected_rows($c);
	echo "<p>Se han eliminado $numFilas filas de la tabla alumnos</p>";


	$sql="UPDATE alumnos SET so='W10*MOS' WHERE provincia='LU'";
	echo "<p>$sql</p>";
	enviarConsultaBD($c,$sql);

	$numFilas=mysqli_affected_rows($c);
	echo "<p>Se han actualizado $numFilas filas de la tabla alumnos</p>";








	mysqli_close($c);//cierra la conexión con la BD, si no lo hago, se libera igualmente al finalizar el script

?>		

	</div>
</body>
</html>