<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>consulta alumnos 2</title>
	<style>
	.nombre {color:red; text-align: center; border:3px dotted red; width: 50%; margin:0px auto;}
	 #contendedor {
	 	width: 80%;
	 	border: 1px solid blue;
	 	margin: 5px auto;
	 	padding: 5px 30px;

	 }
	 .nota {font-size: 0.8em; }
	</style>

</head>
<body>
<div id="contendedor">
	<h2 class="nombre">Pon aquí tu nombre y apellidos</h2>
    <h1>Consulta base datos alumnos</h1>
	<form action="consulta-alumnos2.php" method="get">
		<p>Sexo: 
			<label for="alumna">Mujer</label>
			<input type="radio" id="alumna" value="M" name="sexo">
			<label for="alumno">Hombre</label>
			<input type="radio" id="alumno" value="V" name="sexo">
		</p>
		<p>
			<label for="nacionalidad">Nacionalidad:</label>
			<select name="nac" id="nacionalidad">
				<option value=""></option>
				<option value="32">Argentina</option>
				<option value="76">Brasileña</option>
				<option value="170">colombiana</option>
				<option value="214">Dominicana</option>
				<option value="724">Española</option>
			</select>
		</p>
		<p>
			<label for="texto">Texto en cualquier apellido:</label>
			<input type="text" name="texto" id="texto" size="25">
			<span class="nota">Nota. Cadena de texto que puede estar en cualquiera de los dos apellidos</span>

		<p>
			<input type="submit" name="enviar" value="Consultar">
		</p>
	</form>
</div>
<?php
if($_GET) { //se cumple si el formulario fue enviado
	$sexo=$_GET["sexo"]??"";
	$nac=$_GET["nac"]??"";
	$texto=$_GET["texto"]??"";

	require("datos-conexion-mysql.php");
	$id=mysqli_connect($servidor,$usuario,$clave)
	   or die ("Error al intentar conectar con el servidor MySql Localhost");
	$bd="iaw2014";
	$result=@mysqli_select_db($id,$bd) 
	   or die ("<p>Error seleccionar la base de datos $bd: ".mysqli_error()."</p>");

	$condicion="";
	if ($sexo!="")
		$condicion=" and sexo='$sexo'";

	if ($nac!=""){
		$condicion.=" and codnac='$nac'";
	}

	if ($texto!=""){
			$condicion.=" and (ape1 LIKE '%$texto%' OR ape2 LIKE '%$texto%')";
	}

	$sql="SELECT * FROM alumnos2 WHERE 1 $condicion ORDER BY ape1, ape2, nom";



	echo "<hr>$sql<hr>";
	
	$result=@mysqli_query($id,$sql) 
	  or die ("<p>Error al ejecutar la sentencia sql $sql: ".mysqli_error()."</p>");
    $nfilas=mysqli_num_rows($result); //devuelve número de registros de la select
    echo "<div class='contenedor'>\n";
	echo "<p>$nfilas registros encontrados</p>\n";

	while($fila=mysqli_fetch_array($result)) { 
	// cada vez lee una fila de la SELECT, si no hay, devuelve False
		echo "<br>
		{$fila['nalum']} - 
		{$fila['nom']} - 
		{$fila['ape1']} - 
		{$fila['ape2']} - 
		{$fila['sexo']} - 
		{$fila['codnac']} - 
		{$fila['nac']} -
		{$fila['cur']}";
	}

	echo "</div>\n";
	@mysqli_close($id);
}	

?>

</body>
</html>