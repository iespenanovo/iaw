<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Script php que recibe o formulario enviado por 01-repaso.html</title>
</head>
<body>
	<h1>Datos recibidos:</h1>
	<?php 
		$nome=$_GET['nome']??"";
		$referencia=$_GET['referencia']??"";
		$provincia=$_GET['provincia']??"";
		$so=$_GET['so']??array();
		$sexo=$_GET['sexo']??"";
		$baloncesto=$_GET['baloncesto']??"";
		$natacion=$_GET['natacion']??"";
		$deportes=$_GET['deportes']??array();
		$comentario=$_GET['comentario']??"";


		echo "<p>Nome: $nome</p>";
		echo "<p>Refencia: $referencia</p>";
		echo "<p>Provincia: $provincia</p>";
		echo "<p>Sistemas Operativos:";
		var_dump($so);
		echo "</p>";
		echo "<p>Sexo: $sexo</p>";
		echo "<p>DEPORTES checkbox individuais:</p>";
		echo "<p>Baloncesto: $baloncesto</p>";
		echo "<p>Natación: $natacion</p>";
		echo "<p>DEPORTES checkbox grupal:</p>";
		var_dump($deportes);
		echo "<p>Comentario: $comentario</p>";







	?>

	<a href="01-repaso.html">[ V O L V E R ]</a>

</body>
</html>