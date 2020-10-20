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
	$hora=strftime("%H");
	$hora+=2;
	echo "<br>".strftime("Hoxe é %A, %m de %B de %Y, sendo as $hora horas e %M minutos");

	$instante=mktime(0,0,0,9,11,2001);//data de 11 set 2001
	echo "<br>o 11 de setembro de 2001 foi: ".strftime("%A",$instante);

	for ($ano=2005; $ano<=2020 ; $ano++) { 
			echo "<br> O ano $ano ";
			echo checkdate(2, 29, $ano)?"foi":"non foi";
			echo " bisesto";
	}

	 ?>
</body>
</html>