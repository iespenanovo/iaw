<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Datas en php</title>
</head>
<body>
	<h1>Tratamento de datas en php</h1>

	<?php 
	echo "<br>Instante Unix actual: ".time();
	setlocale(LC_ALL, "galician");
	echo "<br>".strftime("%a %A");
	 ?>
</body>
</html>