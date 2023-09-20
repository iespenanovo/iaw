<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Arrays en PHP</title>
</head>
<body>
	<h1>Arrays en PHP</h1>
<?php 
/***************************************************/
/*           arrays con índices numéricos          */
/***************************************************/

	$col1[0]="luns";
	$col1[1]="martes";
	$col1[2]="mércores";

	echo "\$col1:";
	echo var_dump($col1);

	echo "<hr>";

	$col2[]="luns";
	$col2[]="martes";
	$col2[]="mércores";

	echo "\$col2:";
	echo var_dump($col2);

	echo "<hr>";

	$col3 = array("luns","martes","mércores");

	echo "\$col3:";
	echo var_dump($col3);

/***************************************************/
/*   arrays con índices de cadea (asociativos)     */
/***************************************************/
	echo "<hr>";

	$col4["luns"]=1;
	$col4["martes"]=2;
	$col4["mércores"]=3;
	$col4["xoves"]=4;
	$col4["venres"]=5;

	echo "\$col4:";
	echo var_dump($col4);


	echo "<hr>";
	$col5 = array(
		'luns' => 1 , 
		'martes' => 2 , 
		'mércores' => 3  
	);

	echo "\$col5:";
	echo var_dump($col5);

/***************************************************/
/*                arrays multidimensión            */
/***************************************************/
	echo "<hr>";
	$col6["luns"][0]=200;
	$col6["martes"][1]=300;
	echo "\$col6:";
	echo var_dump($col6);


/***************************************************/
/*          lectura controlada de arrays           */
/***************************************************/

//se pode facer con estructura for, pero máis simple con foreach	

echo "<p>Lectura controlada do array \$col1 con foreach:</p>";

foreach ($col1 as $indice => $valor) {
	echo "<br>Índice:$indice , Valor: $valor";
}

echo "<hr>";
echo "<p>Lectura controlada do array \$col4 con foreach, colocado en lista 'ul' html :</p>";

echo "\n<ul>";
foreach ($col4 as $indice => $valor) {
	echo "\n\t<li>Índice:$indice , Valor: $valor</li>";
}
echo "\n</ul>";

?>	


</body>
</html>