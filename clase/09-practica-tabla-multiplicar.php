<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Generación de números</title>
	<link rel="stylesheet" href="css/09-estilo.css">
</head>
<body>
	<div class="contenedor">
		
		<h1>Genera tabla multiplicar de x</h1>
		<?php 
			$n=$_GET["n"]??"";
		?>
		<form action="">
			<div class="campo">
				<label for="n">Número X:</label>
				<input id="n" type="number" name="n" required value="<?php echo $n ?>" >
			</div>
			<div class="campo">
				<input type="submit" value="Enviar">
			</div>
		</form>

		<?php 
		if ($_GET) { //se cumple solo si el formulario fue enviado (la primera vez no se cumple)
			echo "\n<h3>Tabla del número $n:</h3>";	
			/*
			//solución sin estructura table:
			for ($i=0; $i <= 10 ; $i++) { 
				//$multiplicacion=$i*$n;
				//echo "<br>$i x $n = $multiplicacion";
				echo "<br>$i x $n = ".$i*$n;
			}
			*/

			echo "\n<table>";
			$clase="";
			for ($i=0; $i <= 10 ; $i++) { 
				$multiplicacion=$i*$n;
				echo "\n\t<tr $clase>";
				echo "\n\t\t<td>$i</td>";
				echo "\n\t\t<td>x</td>";
				echo "\n\t\t<td>$n</td>";
				echo "\n\t\t<td>=</td>";
				echo "\n\t\t<td>$multiplicacion</td>";
				//echo "\n\t\t<td>".$i*$n."</td>";//con esta línea evitamos usar la variable $multiplicacion
				echo "\n\t</tr>";
				$clase=$clase=="class='fondogris'"?"":"class='fondogris'";
			}
			echo "\n</table>";

		}
		

		?>

	</div>


	
</body>
</html>