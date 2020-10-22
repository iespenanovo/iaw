<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=	, initial-scale=	">
	<title>Calendario</title>
	<style>	
		#mes {
			max-width: 350px;
			width: 70%;
			margin: 0 auto;

			text-align: center;
			font-weight: bold;
			margin-bottom: 15px;
			display: flex;
			justify-content: space-between;


		}
		#calendario {
			max-width: 350px;
			width: 70%;
			display:flex;
			flex-wrap: wrap;
			margin: 0 auto;

		}
		#calendario div {
			width: 14.28%;
			text-align: center;
		}
		.cab {
			font-weight: 500;
			border-bottom: 1px solid black;
		}
		.diaActual{
			color: blue;
			font-weight: bold;
		}
	</style>
</head>
<body>
<?php 	
	setlocale(LC_ALL, "galician");
	$diasMes = array(0,31,28,31,30,31,30,31,31,30,31,30,31);
				//   0  1  2  3  4  5  6  7  8  9 10 11 12   

	$diaActual=intval(strftime("%e"));//intval para pasar a enteiro
	$mesActual=intval(strftime("%m"));
	$anoActual=intval(strftime("%Y"));
	

	$mes=$_GET["mes"]??$mesActual;
	$mes=intval($mes);	
	$ano=$_GET["ano"]??$anoActual;
	$ano=intval($ano);

	if($mes<1 || $mes>12) $mes=$mesActual;

	$nomeMes=strftime("%B",mktime(0,0,0,$mes,1,$ano));
	//echo "<p>mes a facer: $mes / $ano</p>";

	//echo "<br>diaActual: $diaActual, mesActual: $mesActual, anoActual: $anoActual";

	if(checkdate(2, 29, $ano)){//si se cumple é ano bisesto
		$diasMes[2]=29;
	}

	//echo "<br>Este mes ($mesActual) ten $diasMes[$mesActual] dias";

	$diaSemDia1=strftime("%u",mktime(0,0,0,$mes,1,$ano));
	$diaSemDia1=intval($diaSemDia1);
	//echo "<br>O dia 1 de este mes é o día1 $diaSemDia1 da semana";

?>

	<div id="mes">

		<?php
			echo "<div><a href='?mes=9&ano=2020'>Ant.</a></div>";
		 	echo "<div>$nomeMes - $ano</div>";
			echo "<div><a href='?mes=11&ano=2020'>Seg.</a></div>";
		?>
	</div>
	<div id="calendario">
			<div class="cab">Lun</div>	
			<div class="cab">Mar</div>	
			<div class="cab">Mér</div>	
			<div class="cab">Xov</div>	
			<div class="cab">Ven</div>	
			<div class="cab">Sáb</div>	
			<div class="cab">Dom</div>	
<?php 	
		for ($i=1; $i <$diaSemDia1 ; $i++) { 
			echo "\n\t\t\t<div></div>";
		}

		for ($i=1; $i <= $diasMes[$mes]; $i++) { 
			$clase=($i==$diaActual && $mes==$mesActual && $ano==$anoActual)?"diaActual":"";
			echo "\n\t\t\t<div class='$clase'>$i</div>";
		}

?>

	</div>	
</body>
</html>