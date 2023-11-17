<?php
setlocale(LC_ALL, "spanish");//toma España para horas, monedas, idioma ...
$diasSemana = array('Lu','Ma','Mi','Ju','Vi','Sá','Do');
$numeroDiasMes = array (NULL,31,28,31,30,31,30,31,31,30,31,30,31);
					//  0     1  2  3  4  5  6  7  8  9 10 11 12  

$anoActual=(int) strftime("%Y");
$diaActual=(int) strftime("%d");//día del mes actual en número

$ano=$_GET["ano"]??$anoActual;
$ano= (int) $ano; //pasamos a entero el año, pues $_GET nos devuelve una cadena

//si el año actual es bisiesto, ponemos 29 días en febrero
$numeroDiasMes[2]=checkdate(2, 29, $ano)?29:28;
$numeroMesActual=(int) strftime("%m");




function generaMes($nMes) {
	global $diasSemana, $numeroDiasMes, $anoActual, $diaActual, $numeroMesActual, $ano;

	$numDiaSemanaDia1=(int) strftime("%u",mktime(0,0,0,$nMes,1,$ano));	
	$nombreMes_nMes=strftime("%B",mktime(0,0,0,$nMes,1,$ano));
	echo "\n\t\t\t<h4>$nombreMes_nMes</h4>";
	echo "\n\t\t\t<div class='diasmes'>";
	foreach ($diasSemana as $value) {
		echo "\n\t\t\t\t<div class='cab'>$value</div>";
	}

	//saltar las columnas necesarias para llegar al día de la semana del día 1. Salto $numDiaSemanaDia1 - 1 columnas

	$nDivs=0;//ir contanto las columnas (div's que vamos escribiendo, para saber en qué dia de las semana estamos)
	//for ($i=1; $i <= $numDiaSemanaDia1-1 ; $i++) { 
	for ($i=1; $i < $numDiaSemanaDia1 ; $i++) { 
		$nDivs++;
		echo "\n\t\t\t\t<div></div>";
	}

	for ($i=1; $i <=$numeroDiasMes[$nMes]; $i++) { 
		$clases = ($i==$diaActual and $nMes==$numeroMesActual and $ano==$anoActual) ? "dia-actual" : "";

		$nDivs++;

		if ($nDivs==7) {
			$clases.=" dia-festivo";
			$nDivs=0;
		}

		echo "\n\t\t\t\t<div class='$clases'>$i</div>";	
	}

	echo "\n\t\t\t</div>";

}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Calendario <?php echo "$ano" ?></title>
	<link rel="stylesheet" href="css/03-estilo-calendario.css">
</head>
<body>
	<div class="navegacion">

		<a href="?ano=<?php echo $ano-1 ?>">&lt;&lt; <?php echo $ano-1 ?></a>
		<h1><?php echo $ano ?></h1>
		<a href="?ano=<?php echo $ano+1 ?>"><?php echo $ano+1 ?> &gt;&gt;</a>

	</div>
	<div class="contenedor">
		
		<?php 
		for ($i=1; $i <=12 ; $i++) { 
			echo "\n\t\t<div>";
			generaMes($i);
			echo "\n\t\t</div>";
		}
		
		?>


	</div>

</body>
</html>
