<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Calendario actual</title>
	<link rel="stylesheet" href="css/12-estilo.css">
</head>
<body>
<?php 
	setlocale(LC_ALL , "es");
	$nombreMesActual=strftime("%B");
	$anoActual=strftime("%Y");
	$numeroMesActual=strftime("%m");
	$momentoDia1MesActual=mktime(0,0,0,$numeroMesActual,1,$anoActual);
	$diaSemDia1=strftime("%u",$momentoDia1MesActual);


	echo var_dump($diaSemDia1);



	function generarNombreDiasSemana()
	{
		$diasSem = array('Lu','Ma','Mi','Ju','Vi','Sá','Do');
		foreach ($diasSem as $nombreDia) {
				echo "\n\t\t\t<div class='cab'>$nombreDia</div>";
			}	
	}

	function generarSaltosSemana1($numeroSaltos)
	{
		for ($i=1; $i <=$numeroSaltos ; $i++) { 
			echo "\n\t\t\t<div></div>";
		}
	}

?>		
	<div class="contenedor">
		<h1><?php echo "$nombreMesActual - $anoActual" ?></h1>



		<div class="calendario">
			<?php
			//generar cabecera con nombres dias semana . usamos div con la clase cab 
			generarNombreDiasSemana();
			generarSaltosSemana1($diaSemDia1-1);
			?>

		
			<div class="div">1</div>
			<div class="div">2</div>

		</div>
	</div>

</body>
</html>