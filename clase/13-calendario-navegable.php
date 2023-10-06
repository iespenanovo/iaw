<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Calendario navegable</title>
	<link rel="stylesheet" href="css/12-estilo.css">
</head>
<body>
<?php 
// Este calendario recibe los parámetros mes y ano por GET
// en caso no enviar parámetros, se calcula el mes actual

	setlocale(LC_ALL , "es");


	$anoActual=strftime("%Y");
	$numeroMesActual=(int) strftime("%m");//el 'cast' (int) fuerza a tipo entero, para evitar 01, 02 ... 09 en meses inferiores a octubre
	$diaActual=(int)strftime("%d");


	$mes=$_GET['mes']??$numeroMesActual;
	$ano=$_GET['ano']??$anoActual;


	$momentoDia1Mes=mktime(0,0,0,$mes,1,$ano);
	$diaSemDia1=strftime("%u",$momentoDia1Mes);
	$nombreMes=strftime("%B",$momentoDia1Mes);
	

	//echo var_dump($diaSemDia1);

	$numDiasMes=array("",31,28,31,30,31,30,31,31,30,31,30,31);
	//                0   1  2  3  4  5  6  7  8  9 10 11 12

	if (checkdate(2, 29, $ano)) {
		//si se cumple, quiere decir que el año es bisiesto
		$numDiasMes[2]=29;
	}

	//echo var_dump($numDiasMes);
	//echo "$nombreMes tiene $numDiasMes[$numeroMesActual]";


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

	// function generarSaltosSemana1($numeroSaltos,&$nCol)
	// //genera las columnas vacías necesarias para llegar al día 1 del mes
	// {
	// 	for ($i=1; $i <=$numeroSaltos ; $i++) { 
	// 		$nCol++;
	// 		echo "\n\t\t\t<div></div>";
	// 	}
	// }


?>		
	<div class="contenedor">
		<h1>
			<?php 
			$mesAnt=$mes-1;
			$anoMesAnt=$ano;
			$mesSte=$mes+1;
			$anoMesSte=$ano;
			echo "<a href='?mes=$mesAnt&ano=$anoMesAnt'>&lt;&lt;--</a>";
			echo "<span>$nombreMes - $ano</span>"; 
			echo "<a href='?mes=$mesSte&ano=$anoMesSte'>--&gt;&gt;</a>";


			?>
		</h1>



		<div class="calendario">
			<?php
			//generar cabecera con nombres dias semana . usamos div con la clase cab 
			generarNombreDiasSemana();
			$nItem=$diaSemDia1-1;//queremos controlar en qué columna vamos a generar código html
			generarSaltosSemana1($diaSemDia1-1);
//			$nItem=0;//queremos controlar en qué columna vamos a generar código html
//			generarSaltosSemana1($diaSemDia1-1,$nItem);

			for ($dia=1; $dia <=$numDiasMes[$mes] ; $dia++) { 
				$clases = ($dia==$diaActual and $mes==$numeroMesActual and $ano==$anoActual) ? "diaActual" : "";
				//la línea anterior equivale a las dos siguientes comentadas:
				//$clases="";
				//if($dia==$diaActual) {$clases="diaActual";}

				$nItem++;
				if($nItem==7){
					$clases.=" festivo";
				 	$nItem=0;
				}

				//$clases.=($nItem % 7)==0 ?" festivo":"";


				echo "\n\t\t\t<div class='dia $clases'>$dia</div>";
			}

			?>

		
		</div>
	</div>

</body>
</html>