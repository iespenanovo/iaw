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
			echo "\n<h3>Tabla del número $hasta:</h3>";	


		}
		

		?>

	</div>


	
</body>
</html>