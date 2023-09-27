<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Generación de números</title>
	<link rel="stylesheet" href="css/08-estilo.css">
</head>
<body>
	<div class="contenedor">
		
		<h1>Genera números del 1 al x</h1>
		<?php 
			$hasta=$_GET["hasta"]??"";
		?>
		<form action="">
			<div class="campo">
				<label for="hasta">Número X:</label>
				<input id="hasta" type="number" name="hasta" required value="<?php echo $hasta ?>" >
			</div>
			<div class="campo">
				<input type="submit" value="Enviar">
			</div>
		</form>

		<?php 
		if ($_GET) { //se cumple solo si el formulario fue enviado (la primera vez no se cumple)
			echo "\n<h3>Números del 1 al $hasta:</h3>";	
			echo "\n<p class='numeros'>";
			$color="rojo";
			for ($numero=1; $numero <= $hasta ; $numero++) { 
				echo "<span class='$color'>$numero</span>, ";
				// if ($color=="azul") {
				// 	$color="rojo";
				// } else {
				// 	$color="azul";
				// }
				//el if else anterior equivale a:
				$color = $color=="azul" ? "rojo" : "azul";
				
			}
			echo "</p>";


			//generamos la lista con while:
			echo "\n<hr>";
			echo "\n<div class='numeros'>";
			$numero=1;
			while ($numero <= $hasta) {
				echo "<span class='$color'>$numero</span>";
				$color = $color=="azul" ? "rojo" : "azul";
				$numero++;//equivalente a:	$numero=$numero+1; o:	$numero+=1;
			}

			echo "\n</div>";




		}
		

		?>

	</div>


	
</body>
</html>