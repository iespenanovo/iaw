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
	$numeroMesActual=(int) strftime("%m");//el 'cast' (int) fuerza a tipo entero, para evitar 01, 02 ... 09 en meses inferiores a octubre
	$momentoDia1MesActual=mktime(0,0,0,$numeroMesActual,1,$anoActual);
	$diaSemDia1=strftime("%u",$momentoDia1MesActual);
	$diaActual=(int)strftime("%d");

	//echo var_dump($diaSemDia1);

	$numDiasMes=array("",31,28,31,30,31,30,31,31,30,31,30,31);
	//                0   1  2  3  4  5  6  7  8  9 10 11 12

	if (checkdate(2, 29, $anoActual)) {
		//si se cumple, quiere decir que el año es bisiesto
		$numDiasMes[2]=29;
	}

	//echo var_dump($numDiasMes);
	//echo "$nombreMesActual tiene $numDiasMes[$numeroMesActual]";


	function generarNombreDiasSemana()
	{
		$diasSem = array('Lu','Ma','Mi','Ju','Vi','Sá','Do');
		foreach ($diasSem as $nombreDia) {
				echo "\n\t\t\t<div class='cab'>$nombreDia</div>";
			}	
	}

	function generarSaltosSemana1($numeroSaltos)
	//genera las columnas vacías necesarias para llegar al día 1 del mes
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

			for ($dia=1; $dia <=$numDiasMes[$numeroMesActual] ; $dia++) { 
				$clases = $dia==$diaActual ? "diaActual" : "";
				
				//la línea anterior equivale a las dos siguientes comentadas:
				//$clases="";
				//if($dia==$diaActual) {$clases="diaActual";}
				echo "\n\t\t\t<div class='dia $clases ' >$dia</div>";
			}

			?>

		
		</div>
	</div>

</body>
</html>