<?php 

function nifCorrecto($nif){

	if(strlen($nif)>9) return false;

	$letras="TRWAGMYFPDXBNJZSQVHLCKEO";

	$nif=strtoupper($nif); //pasamos todo a maiusculas 

	$dni=substr($nif,0,-1); //devolve todo menos o último caracter (nº dni)
	if(!is_numeric($dni)) return false;

	$letra=substr($nif,-1); //devolve último caracter (letra)
	if(is_numeric($letra)) return false;

	$posicion= $dni % 23;

	if($letras[$posicion]==$letra)
		return true;
	else
		return false;
}

 // $nif="4g";

 // if(nifCorrecto("$nif"))
 // 	echo "<br>$nif é correcto";
 // else 
 // 	echo "<br>$nif é INcorrecto";


function conectarBaseDatos() {
	require 'datos-conexion-bd.php';
	$c=@mysqli_connect($servidorBD,$usuarioBD,$claveUBD,$nomeBD,$portoBD) or die("<p>Erro ao conectar co servidor de bases de datos $servidorBD<p>");

	$sql="SET NAMES 'utf8';";
	@mysqli_query($c,$sql) or die ("<p>Erro ao executar a sentenza sql: <b>$sql</b>
		<br> Error número: ".mysqli_errno($c).
		"<br> Descrición erro: ".mysqli_error($c).
		"</p>");

	return $c;
}

function sql($c,$sql) {
	$resultado=@mysqli_query($c,$sql) or die ("<p>Erro ao executar a sentenza sql: <b>$sql</b>
	<br> Error número: ".mysqli_errno($c).
	"<br> Descrición erro: ".mysqli_error($c).
	"</p>");	
	return $resultado;
}

?>