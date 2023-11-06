<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Enviar fichero</title>
</head>
<body>

<h1>Enviar Fichero</h1>

<form action="" method="post" enctype="multipart/form-data">
	
	<p><label>
		Nombre:
		<input type="text" name="nombre">
	</label></p>

	<!-- <input type="hidden" name="MAX_FILE_SIZE" value="51200"> -->	
	<!-- impide que el navegador envíe fichero de más del valor indicado -->

	<p><label>Fichero:
		<input type="file" name="fichero">
	</label></p>

	<p>
		<input type="submit" value="Enviar" name="enviar">
	</p>

</form>


<?php 
if (!$_POST) 
	exit(); // el formulario no fue enviado todavía, salimos

// el formulario fue enviado:

$nombre=$_POST["nombre"]??"";

$fichero_temp=$_FILES["fichero"]["tmp_name"];
$fichero_name=$_FILES["fichero"]["name"];
$fichero_size=$_FILES["fichero"]["size"];

echo "<hr>";
echo "<h3>Datos recibidos:</h3>";
echo "<br>Nombre: $nombre";
echo "<br>Nombre fichero: $fichero_name ";
echo "<br>Ubicación temporal: $fichero_temp ";
echo "<br>Tamaño: $fichero_size ";
echo "<hr>";

$directorio="datos";

if ($fichero_size>51200) {
	echo "<br>El fichero $fichero_name ocupa más de 51.200 bytes";
} elseif ($fichero_size<=0) {
	echo "<br>No se ha enviado ningún fichero";
} else {
	if (move_uploaded_file($fichero_temp, $directorio."/".$fichero_name)) {
		echo "<br>El fichero $fichero_name fue guardado en $directorio";
	} else {
		echo "<br>Error al grabar el fichero $fichero_name en $directorio";
	}
}
@unlink($fichero_temp); //aseguramos se borra el archivo temporal

 ?>

	
</body>
</html>