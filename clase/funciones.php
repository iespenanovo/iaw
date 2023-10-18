<?php 

function calculoLetraDNI($dni)
	{

		if(!is_numeric($dni))
			return false;

		$letras="TRWAGMYFPDXBNJZSQVHLCKE";
		//		 01234567890123456789012
		//		           1         2 
		$resto=$dni % 23;

		$letra=$letras[$resto];

		//echo "<br>$dni-$letra";

		return $letra;

	}	

//$letra=calculoLetraDNI(12345678);//z
//$letra=calculoLetraDNI(11223344);//B

function validarNIF($nif)
{
	$nif=strtoupper($nif);

	if(strlen($nif)>9) {
		return false;
	}

	$dni=substr($nif, 0,-1);//extrae todos los caracters del $nif, excepto el útimo
	$letra=substr($nif, -1);//extrae el último caracter de $nif

	//echo "<br>$nif --> $dni - $letra";

	if(!is_numeric($dni)){ //compobamos que el dni es numérico
		return false;
	}
	if(is_numeric($letra)) {//comprobamos que la letra no es un número 
		return false;
	}

	$letraCalculada=calculoLetraDNI($dni);

	if($letra==$letraCalculada) {
		return true;
	} else {
		return false;
	}


}

//echo validarNIF("1A2346786")??"Correcto":"Incorrecto";

// if (validarNIF("012345678z"))
// 	echo " Correcto";
// else 
// 	echo " Incorrecto";


?>
