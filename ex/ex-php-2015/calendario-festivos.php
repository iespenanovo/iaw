<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Calendario mes actual</title>
	<link rel="stylesheet" href="css/calendario-festivos.css">
</head>
<body>
<?php 
setlocale(LC_ALL, "spanish"); //galician para galicia e galego
$diasSem=array("Lu","Ma","Mi","Ju","Vi","Sa","Do");
//				 0   1    2    3    4    5    6    
$diasMes=array(0,31,28,31,30,31,30,31,31,30,31,30,31);
//			   0  1  2  3  4  5  6  7  8  9 10 11 12					


$diaActual= (int) strftime("%d"); // dia actual en número decimal 1-12
$mesActual= (int) strftime("%m"); // mes actual en número decimal 1-12
$anoActual= (int) strftime("%Y"); // año actual con 4 dígitos

$mes=isset($_GET["mes"])?$_GET["mes"]:$mesActual;
$ano=isset($_GET["ano"])?$_GET["ano"]:$anoActual;


if(checkdate(2, 29, $ano)) //devuelve true si existe el 29 de feb
	$diasMes[2]=29; //reescribimos dias de febreo si año es bisiesto


//Momento Unix del día 1 del mes actual:
$momentoDia1=mktime(0,0,0,$mes,1,$ano); 

$nombreMes=strftime("%B",$momentoDia1); // nombre del mes en curso

$diaComienzaMes=strftime("%w",$momentoDia1);
//devuelve de 0 a 6, 0 domingo, 1 lunes ... 6 sábado


if ($diaComienzaMes==0) 
	$diaComienzaMes=7; // forzamos a 7 si comienza el mes en domingo


$anoAnt=$ano;
$anoSig=$ano;

$mesAnt=$mes-1;
if ($mesAnt==0) { //si el mes actual es enero
	$mesAnt=12;   // el mes anterior será diciembre del año anterior
	$anoAnt=$ano-1; // por lo que restamos una unidad al año
}

$mesSig=$mes+1;
if ($mesSig==13) { // si el mes actual es diciembre
	$mesSig=1;     // el mes siguiente será enero del próximo año
	$anoSig=$ano+1;// por lo que sumamos una unidad al año
}


?>	

<div id="contenedor">
	<h1 id="mes"><?php echo "$nombreMes - $ano" ?></h1>	
	<div id="mant" class="mantsig">
		<a href="<?php echo "calendario-festivos.php?mes=$mesAnt&ano=$anoAnt" ?>">&lt;&lt;- Mes ant.</a></div>
	<div id="msig" class="mantsig">
		<a href="<?php echo "calendario-festivos.php?mes=$mesSig&ano=$anoSig" ?>">Mes sig. -&gt;&gt;</a></div>
	<br class="limpar">

<?php 
	/* Este código php genera la estructura comentada anterior*/
	foreach ($diasSem as $nombreDia) {
		echo "\n\t<div class='dia cab'>$nombreDia</div>";
	}

	//$contadorDias=0; //cuenta días desde lunes
	for ($saltos=1; $saltos<=$diaComienzaMes-1; $saltos++) {
		//$contadorDias++;
		echo "\n\t<div class='dia'>&nbsp;</div>";
	}

	for ($dia=1; $dia<=$diasMes[$mes]; $dia++) {
		$clase="";
		if (strftime("%w",mktime(0,0,0,$mes,$dia,$ano))==0) //hace el trabajo de $contadorDias
			$clase="domingo";
		if($diaActual==$dia and $mesActual==$mes & $anoActual==$ano) 
		 	$clase.=" diaActual";
		echo "\n\t<div class='dia $clase'>$dia</div>";
	}
 ?>
</div>
</body>
</html>