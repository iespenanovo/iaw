<!DOCTYPE html>
<html lang="gl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bases de datos</title>
</head>
<body>
	<h1>Bases de datos en PHP</h1>	

<?php 
	require 'datos-conexion-bd.php';
	$c=@mysqli_connect($servidorBD,$usuarioBD,$claveUBD,$nomeBD,$portoBD) or die("<p>Erro ao conectar co servidor de bases de datos $servidorBD<p>");

	echo "<p>Conexión exitosa con $servidorBD<p>";

	if($nomeBD=="")
		$nomeBD="iaw2020";


	$sql="CREATE DATABASE IF NOT EXISTS $nomeBD DEFAULT CHARSET=utf8;";
	@mysqli_query($c,$sql) or die ("<p>Erro ao executar a sentenza sql: <b>$sql</b>
								   <br> Error número: ".mysqli_errno($c).
								   "<br> Descrición erro: ".mysqli_error($c).
								   "</p>");


	echo "<p>A base de dastos $nomeBD foi creada (se non existía)<p>";

	@mysqli_select_db($c,$nomeBD) or die ("<p>Erro ao seleccionar a base de datos $nomeBD
								   <br> Error número: ".mysqli_errno($c).
								   "<br> Descrición erro: ".mysqli_error($c).
								   "</p>");

	echo "<p>A base de datos $nomeBD foi seleccionada</p>";



	$sql="SET NAMES 'utf8';";
	@mysqli_query($c,$sql) or die ("<p>Erro ao executar a sentenza sql: <b>$sql</b>
								   <br> Error número: ".mysqli_errno($c).
								   "<br> Descrición erro: ".mysqli_error($c).
								   "</p>");


	echo "<p>Codificación UTF-8 establecida<p>";



	$sql="CREATE TABLE IF NOT EXISTS alumnos
		(
			id			INT NOT NULL AUTO_INCREMENT,
			nome		CHAR(40),
			nif 		CHAR(9),
			sexo		CHAR(1),
			deportes	CHAR(10),
			provincia	CHAR(2),
			comentario	TEXT,
			PRIMARY KEY (id),
			UNIQUE (nif)

		);";



	@mysqli_query($c,$sql) or die ("<p>Erro ao executar a sentenza sql: <b>$sql</b>
								   <br> Error número: ".mysqli_errno($c).
								   "<br> Descrición erro: ".mysqli_error($c).
								   "</p>");


	echo "<p>Creose a táboa alumnos (se non existía)<p>";	

	$sql="TRUNCATE TABLE alumnos;";
	@mysqli_query($c,$sql) or die ("<p>Erro ao executar a sentenza sql: <b>$sql</b>
								   <br> Error número: ".mysqli_errno($c).
								   "<br> Descrición erro: ".mysqli_error($c).
								   "</p>");



	$sql="INSERT INTO alumnos VALUES 
		(NULL,'Ana Díaz','33445546H','M','bl-tn','PO','Informática'),
		(NULL,'Julia Gómez','33425546L','M','ft-tn','LU','Administrativo'),
		(NULL,'Manuel Abuín','33945546X','H','bl-ft','CO','Informática'),
		(NULL,'Andrés Díaz','33745546K','H','ft','OU','Inglés'),
		(NULL,'Ana Andión','33245546A','M','bl','LU','Matemáticas')
		;

	";

	@mysqli_query($c,$sql) or die ("<p>Erro ao executar a sentenza sql: <b>$sql</b>
								   <br> Error número: ".mysqli_errno($c).
								   "<br> Descrición erro: ".mysqli_error($c).
								   "</p>");

	$nFilas=mysqli_affected_rows($c);
	echo "<p>Engadíronse $nFilas rexistros á táboa alumnos<p>";	

	//sentenzas SELECT
//	$sql="SELECT * FROM alumnos WHERE provincia='LU' ORDER BY provincia, nome;";
	$sql="SELECT * FROM alumnos ORDER BY provincia, nome;";
	$resultado=@mysqli_query($c,$sql) or die ("<p>Erro ao executar a sentenza sql: <b>$sql</b>
								   <br> Error número: ".mysqli_errno($c).
								   "<br> Descrición erro: ".mysqli_error($c).
								   "</p>");

	//echo var_dump($resultado);
	
	$nFilas=mysqli_num_rows($resultado);
	echo "<p>A sentenza <b>$sql</b> devolve $nFilas filas<p>";

	while ($fila=mysqli_fetch_row($resultado)) {

		echo "<br>$fila[0] - $fila[1] - $fila[2] - $fila[3] - $fila[4] - $fila[5] - $fila[6]";
		
	}

	$sql="SELECT * FROM alumnos ORDER BY sexo,nome;";
	$resultado=@mysqli_query($c,$sql) or die ("<p>Erro ao executar a sentenza sql: <b>$sql</b>
								   <br> Error número: ".mysqli_errno($c).
								   "<br> Descrición erro: ".mysqli_error($c).
								   "</p>");

	//echo var_dump($resultado);
	
	$nFilas=mysqli_num_rows($resultado);
	echo "<p>A sentenza <b>$sql</b> devolve $nFilas filas<p>";

	while ($fila=mysqli_fetch_array($resultado)) {

		echo "<br>{$fila['id']} - {$fila['sexo']} - {$fila['nome']} - {$fila['provincia']}";
		
	}


	//DELETE
	$sql="DELETE FROM alumnos WHERE provincia='CO'";

	@mysqli_query($c,$sql) or die ("<p>Erro ao executar a sentenza sql: <b>$sql</b>
								   <br> Error número: ".mysqli_errno($c).
								   "<br> Descrición erro: ".mysqli_error($c).
								   "</p>");

	$nFilas=mysqli_affected_rows($c);
	echo "<p>Borráronse $nFilas filas ao executar a sentenza $sql<p>";		

	
	//UPDATE
	$sql="UPDATE alumnos SET deportes='ft' WHERE sexo='H'";

	@mysqli_query($c,$sql) or die ("<p>Erro ao executar a sentenza sql: <b>$sql</b>
								   <br> Error número: ".mysqli_errno($c).
								   "<br> Descrición erro: ".mysqli_error($c).
								   "</p>");

	$nFilas=mysqli_affected_rows($c);
	echo "<p>sentenza $sql actualizou $nFilas filas<p>";



	mysqli_close($c);

	


?>	

	
</body>
</html>