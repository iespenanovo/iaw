<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Variables en PHP</title>
</head>
<body>
	<h1>Variables en PHP</h1>
<?php 
$nome="Luis"; //asignación por valor
echo "\t<p>a variable \$nome ten valor '$nome'</p>";
$nome="Ana";
echo "\n\t<p>a variable \$nome ten valor '$nome'</p>";

$nome2=&$nome; //asignación por referencia, comparten misma dirección en memoria, de feito son a mesma variable

echo "\n\t<p>a variable \$nome ten valor '$nome'</p>";
echo "\n\t<p>a variable \$nome2 ten valor '$nome2'</p>";

$nome="Andrés";

echo "\n\t<p>a variable \$nome ten valor '$nome'</p>";
echo "\n\t<p>a variable \$nome2 ten valor '$nome2'</p>";





?>

</body>
</html>