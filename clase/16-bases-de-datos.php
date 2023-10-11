<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bases de datos desde PHP</title>
	<style>
		.error {
			color: red;
		}
	</style>
</head>
<body>
	<h1>Bases de datos desde PHP</h1>

<?php 

	//nos conectamos al servidor de bases de datos

	//$c=mysqli_connect("localhost", "root", ""   ,"",       3306);
	//                   servidor  user   passw  baseDatos, puerto(por defecto el 3306) 

	//es más práctico tener los datos de conexión en un único archivo
	require 'datos-conexion-BD.php';
	$c=@mysqli_connect($BD_servidor,$BD_usuario,$BD_clave,$BD_baseDatos,$BD_puerto) or die("<p>Error conectando con el servidor de bases de datos $BD_servidor</p>");

	$BD_baseDatos="iaw-23-24";
	$SQL="CREATE DATABASE IF NOT EXISTS `$BD_baseDatos` COLLATE 'utf8_general_ci'";

    echo "<p>$SQL</p>";

    consultaSQL($c,$SQL);

    echo "<p>se creó la base de datos $BD_baseDatos</p>";

    @mysqli_select_db($c,$BD_baseDatos) or die("<p class='error'>Error al seleccionar la base de datos $BD_baseDatos</p>") ;

    echo "<p>Se ha seleccionado la base de datos $BD_baseDatos</p>";

    $SQL="SET NAMES 'utf8'";
    echo "<p>$SQL</p>";
    consultaSQL($c,$SQL);
	$SQL="CREATE TABLE IF NOT EXISTS alumnos 
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
	echo "<p>$SQL</p>";
	consultaSQL($c,$SQL);

	echo "<p>Se creó la tabla alumnos</p>";

	$SQL="TRUNCATE alumnos";//elemina el contenido de la tabla
	echo "<p>$SQL</p>";
	consultaSQL($c,$SQL);

	$cadenaHash=hash('md5', 'abc123.');
	$SQL="INSERT INTO `alumnos` (`nombre`, `nif`, `clave`, `sexo`, `deportes`, `provincia`, `so`, `comentario`) VALUES
	('Ana Díaz','12345678Z','$cadenaHash','M','N*B','LU','w10*LX','Preferencia nocturno'),
	('Luis Fernández','12345677J','".hash('md5','abc123.')."','H','F*B','CO','w10*LX','Preferencia diúrno'),
	('Gonzalo Abuín','12345676N','".hash('md5','abc123.')."','H','F*N','PO','w8*MOS',''),
	('Julia Moteagudo','12345675B','".hash('md5','abc123.')."','M','F*N*B','CO','w8*LX','Becario'),
	('César Ríos','12345674X','".hash('md5','abc123.')."','H','F*N','LU','w10','Preferencia nocturno')
	";

	echo "<p>$SQL</p>";
	consultaSQL($c,$SQL);

	$numFilas=mysqli_affected_rows($c);

	echo "<p>Se insertaron $numFilas registros en la tabla alumnos</p>";

	$SQL="SELECT * FROM alumnos ORDER BY provincia,nombre";
	echo "<p>$SQL</p>";
	$resultado=consultaSQL($c,$SQL);
	$numFilas=mysqli_num_rows($resultado);
	echo "<p>La sentencia devuelve $numFilas filas</p>";

	//var_dump($resultado);

	//$fila=mysqli_fetch_row($resultado);//devuelve la ste fila en un array con índices numéricos (0, 1 ...), devuelve false si no quedan filas

	while ($fila=mysqli_fetch_row($resultado)) {
		//echo "<br>$fila[0] - $fila[1] - ... ";
		list($id,$nombre,$nif,$clave,$sexo,$deportes,$provincia,$so,$comentario)=$fila;
		echo "<br> $id - $nombre - $nif - $clave - $sexo - $deportes - $provincia - $so - $comentario";
	}

	$SQL="SELECT * FROM alumnos WHERE provincia='LU' or provincia='CO' ORDER BY provincia DESC, nombre ASC";
	echo "<p>$SQL</p>";
	$resultado=consultaSQL($c,$SQL);
	$numFilas=mysqli_num_rows($resultado);
	echo "<p>La sentencia devuelve $numFilas filas</p>";

	//var_dump($resultado);

	//$fila=mysqli_fetch_array($resultado);//devuelve la ste fila en un array asociativo, con índices de nombres de campo  ('id', 'nombre' ...), devuelve false si no quedan filas

	while ($fila=mysqli_fetch_array($resultado)) {
		echo "<br> {$fila['id']} - {$fila['nombre']} - {$fila['nif']} - {$fila['clave']} - {$fila['sexo']} - {$fila['deportes']} - {$fila['provincia']} - {$fila['so']} - {$fila['comentario']}";
	}

	$SQL="DELETE FROM alumnos WHERE provincia='CO'";
	echo "<p>$SQL</p>";
	consultaSQL($c,$SQL);
	$numFilas=mysqli_affected_rows($c);
	echo "<p>Se borraron $numFilas registros en la tabla alumnos</p>";

	$SQL="UPDATE alumnos SET so='W10*MOS' WHERE provincia='LU'";
	echo "<p>$SQL</p>";
	consultaSQL($c,$SQL);
	$numFilas=mysqli_affected_rows($c);
	echo "<p>Se actualizaron $numFilas registros en la tabla alumnos</p>";

	mysqli_close($c);//cierra la conexión con el servidor de BD. Si no lo hacemos , se libera igualmente al finalizar el script
?>	
</body>
</html>